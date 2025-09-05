<?php
// Set page-specific title
$pageTitle = "St Patricks' - Brain Break | Game Wheel";

// Include scripts in the header
$headerScripts = <<<EOT
<script src="./items.js"></script>
<script type="module">
    import { Wheel } from "https://cdn.jsdelivr.net/npm/spin-wheel@5.0.2/dist/spin-wheel-esm.js";

    export async function loadImages(images = []) {
        const promises = [];

        for (const img of images) {
            if (img instanceof HTMLImageElement)
                promises.push(img.decode());
        }

        try {
            await Promise.all(promises);
        } catch (error) {
            throw new Error("An image could not be loaded");
        }
    }

    function redirectEmbedCode(redirectUrl) {
        if (typeof redirectUrl !== "string") {
            throw new Error("redirectUrl must be a string");
        }

        var embed = `<div style="position:relative;height:0;padding-bottom:117.6%;overflow:hidden;"><iframe style="position:absolute;top:0;left:0;width:100%;height:100%;" src="\${redirectUrl}" allowfullscreen="allowfullscreen" sandbox="allow-popups allow-forms allow-scripts allow-same-origin" frameborder="0"></iframe></div>`;

        return embed;
    }

    window.onload = async () => {
        // Create image elements
        const image = new Image();
        const overlayImage = new Image();

        // Set image sources
        image.src = "./img/example-0-image.svg";
        overlayImage.src = "./img/example-0-overlay.svg";

        // Use your loadImages function to wait for them to load
        await loadImages([image, overlayImage]);
        const props = {
            name: "Workout",
            items: items,
            image: image,
            overlayImage: overlayImage,
            radius: 0.84,
            itemLabelRadius: 0.95,
            itemLabelRadiusMax: 0.25,
            itemLabelRotation: 180,
            itemLabelColors: ["#fff"],
            itemLabelFont: "Comic Sans MS",
            itemLabelAlign: "left",
            itemBackgroundColors: [
                "#ffc93c",
                "#66bfbf",
                "#a2d5f2",
                "#515070",
                "#43658b",
                "#ed6663",
                "#d54062",
            ],
            rotationSpeedMax: 500,
            rotationResistance: -100,
            lineWidth: 1,
            lineColor: "#fff",
        };

        let container = document.querySelector("#wheel-wrapper");
        let result = document.querySelector("#result");

        window.wheel = new Wheel(container, props);

        window.wheel.onSpin = (event) => {
            console.log("Spin started", event);
            result.innerHTML = `Spinning...`;
        };

        window.wheel.onRest = (event) => {
            let dataResult = event.currentIndex;
            result.innerHTML = `You landed on: \${props.items[dataResult].label}`;

            // open a new tab with the redirect URL
            console.log(
                `Redirecting to: \${props.items[dataResult].redirect}`,
            );
            // Use window.location.href to redirect
            // window.open(props.items[dataResult].redirect, "_blank");
            let item = props.items[dataResult];
            result.innerHTML = `<h2>\${
                item.label
            }</h2>\${redirectEmbedCode(props.items[dataResult].redirect)}
            `;
        };
    };

    window.wheel = null; // Initialize wheel to null

    if (typeof window !== "undefined") {
        // Ensure this runs in a browser context
        console.log(
            "Window is defined, script is running in a browser.",
        );
    } else {
        console.log(
            "Window is not defined, script is running in a non-browser context.",
        );
    }
</script>
EOT;

// Page content
?>
<div class="game-wheel-container">
    <button class="button is-primary" onclick="window.wheel.spin(500)">Spin the wheel</button>

    <div id="panes">
        <div id="wheel-wrapper"></div>
        <div id="result"></div>
    </div>
</div>
