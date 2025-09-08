// @ts-check
import { defineConfig } from "astro/config";

import vercel from "@astrojs/vercel";

import sanity from "@sanity/astro";

// https://astro.build/config
export default defineConfig({
  output: "server",
  adapter: vercel(),
  integrations: [
    sanity({
      projectId: "dgo6zlhr",
      dataset: "production",
      useCdn: true,
    }),
  ],
});
