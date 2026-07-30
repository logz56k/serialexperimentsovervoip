---
name: json-data-reader
description: "Use when you need to inspect, validate, query, summarize, transform, or leverage JSON data in this workspace. Ideal for reading JSON files, extracting fields, explaining structure, or turning JSON content into code, reports, or API-ready output."
argument-hint: "Which JSON file or data task should I inspect?"
disable-model-invocation: false
---

# JSON Data Reader

Use this skill when the task involves reading JSON files and turning that data into a useful result. It is optimized for workspace-local analysis, safe inspection, and practical reuse of JSON content.

## Goal

Produce a clear, evidence-based result from JSON data such as:
- schema or structure summary
- field extraction
- filtering and sorting
- validation or error checking
- transformation into code, snippets, or report text
- example usage for PHP, JavaScript, or other workspace tooling

## Workflow

1. Identify the JSON target
   - Confirm the file path or the exact JSON payload that should be used.
   - If the input is a file, check whether it is valid JSON and whether it is the correct workspace file.

2. Inspect the structure first
   - Read the top-level object or array shape.
   - Note the key names, nested objects, array contents, and likely data types.
   - Call out any missing, inconsistent, or suspicious fields.

3. Decide the task intent
   - If the goal is explanation, summarize the dataset.
   - If the goal is extraction, list the relevant fields and sample values.
   - If the goal is transformation, convert the data into a useful format such as a table, script, or API payload.
   - If the goal is validation, flag malformed JSON, missing keys, inconsistent types, or impossible values.

4. Use the data directly
   - Quote the relevant evidence from the JSON file when needed.
   - Base conclusions on actual values, not assumptions.
   - Prefer a concise answer with examples, counts, and a short interpretation.

5. Verify the result
   - Check that the output matches the actual JSON content.
   - Confirm the answer remains faithful to the file or payload provided.
   - If a request is ambiguous, state the assumption explicitly.

## Decision Points

- If the JSON is malformed: report the parse error and stop before guessing.
- If the JSON is valid but nested: inspect one level at a time and summarize the relationships.
- If the request is for “use” rather than “read”: produce a practical transformation, code snippet, or next-step recommendation.
- If there are multiple JSON files: ask which one should be the authoritative source before proceeding.

## Quality Criteria

A good result should:
- reference the actual JSON structure and values
- explain the data in plain language when needed
- avoid inventing fields that are not present
- provide a concrete deliverable such as a summary, query, sample output, or code snippet
- be small, direct, and repeatable

## Example Prompts

- “Read this JSON file and summarize its structure.”
- “Extract the most important fields from guestbook_entries.json.”
- “Show how to use this JSON data in PHP.”
- “Validate this JSON payload and point out any problems.”
- “Convert this JSON into a concise report or table.”
