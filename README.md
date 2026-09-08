# Serial Experiments Over VoIP
### Navi / Copeland OS 4.92 — 14 Layers of Lain

> *"Present day, present time... Hahahaha."*

A CRT phosphor terminal dashboard built in PHP, integrating a 14-layer personal OS architecture recovered from a 4,818-prompt Gemini Takeout archive.

---

## Features

- **14 Layer Architecture** — Each layer maps a domain of consciousness (WEIRD, PSYCHE, PROTOCOL, ECHO, NATHAN, etc.)
- **CRT Phosphor Themes** — Green / Amber / Cyan / White with scanline overlay & vignette
- **Matrix Rain Canvas** — Katakana/Latin rain, resize-safe, `aria-hidden`
- **Layer Audio** — Per-layer MP3 voice clips, audio toggle, whitelist-validated paths
- **Terminal Emulator** — Layer 13 ECHO shell with `help`, `layer`, `theme`, `audio`, `clear`, `ls`, `nms` commands
- **GDI Breakcore Visualizer** — Layer 14 NATHAN & `understand.php` rainbow bleed engine
- **No Man's Sky Gold Refining Table** — Pulled from archive data (`nms` command)
- **Gemini Takeout Integrated** — 4,818 prompts parsed into layer data fields

## Structure

```
Central.php          — Main PHP dashboard (all 14 layers)
understand.php       — GDI Breakcore Visualizer (Understand)
online_persona.mp3   — Audio track & Layer 14 relay
layers/              — 13 x per-layer MP3 voice clips
layer_all.mp3        — Full combined audio track
```

## Run

Requires a PHP server:

```bash
php -S localhost:8000
# open http://localhost:8000/Central.php
```

## Deploy to InfinityFree

GitHub Actions will upload the site over FTP on every push to `master`.

Add these repository secrets in GitHub:

| Secret | Value |
|--------|-------|
| `FTP_SERVER` | InfinityFree FTP host, usually `ftpupload.net` |
| `FTP_USERNAME` | InfinityFree FTP username |
| `FTP_PASSWORD` | InfinityFree FTP password |
| `FTP_SERVER_DIR` | Target folder, usually `/htdocs/` or `/yourdomain/htdocs/` |

The workflow excludes `.git`, GitHub workflow files, local runtime files, and the raw `logan_digitalmind/` archive.

## Terminal Commands

| Command | Description |
|---------|-------------|
| `layer <1-14>` | Switch layer & trigger voice clip |
| `theme <green\|amber\|cyan\|white>` | Change phosphor palette |
| `audio <on\|off>` | Toggle layer audio |
| `ls` | List archive filesystem nodes |
| `nms` | No Man's Sky gold refining yield table |
| `clear` | Clear shell |

---

*lain@dsl-unix:~$ — LSD/DSL Layer 13 Gateway // Copeland OS 4.92*
