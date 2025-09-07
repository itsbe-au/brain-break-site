export function spinSpeed(min = 100, max = 1000) {
  /**
   * Pick a random number between min and max inclusive.
   */
  let randomNumber = Math.floor(Math.random() * (max - min + 1)) + min;
  console.log(`Spin speed: ${randomNumber}`);
  return randomNumber;
}

export async function loadImages(images = []) {
  /**
   * Helper function to load some images
   */
  const promises = [];

  for (const img of images) {
    if (img instanceof HTMLImageElement) promises.push(img.decode());
  }

  try {
    await Promise.all(promises);
  } catch (error) {
    throw new Error("An image could not be loaded");
  }
}

export async function loadFonts(fontNames = []) {
  // Fail silently if browser doesn't support font loading.
  if (!("fonts" in document)) return;

  const promises = [];

  for (const i of fontNames) {
    if (typeof i === "string") promises.push(document.fonts.load("1em " + i));
  }

  await Promise.all(promises);
}
