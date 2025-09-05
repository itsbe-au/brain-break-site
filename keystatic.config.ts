import { config, fields, collection } from "@keystatic/core";

export default config({
  storage: {
    kind: "local",
  },
  collections: {
    // jokes: collection({
    //     label: "Jokes",
    //     slugField: "question",
    //     path: "src/content/jokes.json",
    //     schema: {
    //         id: fields.number({ label: "ID" }),
    //         question: fields.text({ label: "Question" }),
    //         answer: fields.text({ label: "Answer" }),
    //     },
    // }),
  },
});
