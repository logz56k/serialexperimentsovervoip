<?php
session_start();

$hit_counter_file = __DIR__ . '/hit_counter.txt';
$guestbook_file = __DIR__ . '/guestbook_entries.json';

function read_counter($path) {
    if (!file_exists($path)) {
        return 1336;
    }
    $value = (int) trim((string) file_get_contents($path));
    return $value > 0 ? $value : 1336;
}

function read_guestbook($path) {
    if (!file_exists($path)) {
        return [
            [
                'name' => 'anonymous@wired',
                'message' => 'Present day, present time. The guestbook node is alive.',
                'time' => '2006-04-19 23:42:00'
            ],
            [
                'name' => 'sysop',
                'message' => 'Leave a transmission. HTML stripped, signal preserved.',
                'time' => '2006-04-20 00:13:37'
            ]
        ];
    }

    $decoded = json_decode((string) file_get_contents($path), true);
    return is_array($decoded) ? array_slice($decoded, 0, 20) : [];
}

$guestbook_status = '';

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST' && ($_POST['action'] ?? '') === 'sign_guestbook') {
    $name = trim(strip_tags((string) ($_POST['guest_name'] ?? 'anonymous@wired')));
    $message = trim(strip_tags((string) ($_POST['guest_message'] ?? '')));
    $name = substr($name !== '' ? $name : 'anonymous@wired', 0, 32);
    $message = substr($message, 0, 280);

    if ($message !== '') {
        $entries = read_guestbook($guestbook_file);
        array_unshift($entries, [
            'name' => $name,
            'message' => $message,
            'time' => date('Y-m-d H:i:s')
        ]);
        file_put_contents($guestbook_file, json_encode(array_slice($entries, 0, 20), JSON_PRETTY_PRINT));
        $guestbook_status = 'TRANSMISSION SAVED';
    } else {
        $guestbook_status = 'EMPTY TRANSMISSION DROPPED';
    }
}

$visitor_count = read_counter($hit_counter_file) + 1;
file_put_contents($hit_counter_file, (string) $visitor_count);
$guestbook_entries = read_guestbook($guestbook_file);

// --- NAVI / COPELAND OS DATABASE (Sanitized Public Mirror) ---
$user_database = [
    "Layer 01 // WEIRD" => [
        "Layer_Name" => "WEIRD",
        "Central_Memory_Goal" => "Compress all Gemini conversations into a centralized memory file (Central.php architecture). 4,818 prompts recovered & integrated from Takeout archive.",
        "Clearance_Status" => "Level 6 Computing & Cyber-System Operations Node",
        "Vetting_Telemetry" => "Security vetting active & verified. System persistence layer intact.",
        "Age_Cycle" => "System Uptime active. Rotating 12h night / 11h day operational schedule.",
        "Previous_Node" => "Regional physical network anchors",
        "Archive_Format" => "system_archive/corrupt_wav/ — 321 zipped conversation frames + audio telemetry",
        "Core_Philosophy" => "No matter where you go, everyone is connected.",
        "Interaction_Profile_Pattern" => "Pragmatic, technical, and detail-oriented interaction style with focus on system administration, automotive telemetry, and niche audio curation.",
        "Query_Characteristics" => 'System administration, protocol diagnostics, audio synthesis, and shift logistics.'
    ],
    "Layer 02 // GIRLS" => [
        "Layer_Name" => "GIRLS",
        "Primary_Connections" => "Trusted Peer Links & Primary Network Tethers",
        "Media_Relays" => "Media library summaries & video frame extraction pipelines",
        "Communication_Status" => "Active Packet Exchange & Synchronized Relay Protocols",
        "Photo_Archive" => "Automated photo clip synthesis — frame extraction pipeline active",
        "Notes" => "Synchronized network nodes. Maximum signal strength maintained.",
        "Profile_Demographics" => "Level 6 Computing & Cybersecurity Specialist, IT Infrastructure Operator.",
        "Creative_Interests" => 'Breakcore, Happy Hardcore, Web-core, J-core, Aphex Twin, and retro-tech aesthetics.'
    ],
    "Layer 03 // PSYCHE" => [
        "Layer_Name" => "PSYCHE",
        "Audio_Transmissions" => "The Prodigy ('Out of Space'), Uranium Fever, Willie Nelson — ('Funny How Time Slips Away')",
        "Key_Frequencies" => "Aphex Twin ('Polynomial-C', 'Ageispolis'), BOA ('Duvet'), Breakcore, Happy Hardcore, J-Core",
        "Visual_Feeds" => "Serial Experiments Lain (1998) — CRT aesthetic, cyberpunk scanline UI, phosphor decay renders",
        "Gemini_Live_Sessions" => "Audio sessions recorded via Android Gemini Live — 02:02 timestamp captures detected in corrupt_wav archive",
        "Mental_State" => "High-frequency cyber-resonance. Atmospheric breakbeats sustaining cognitive uptime.",
        "Preference_Signals" => 'Strong affinity for precise curation, technical detail, and exact correction of named entities.'
    ],
    "Layer 04 // RELIGION" => [
        "Layer_Name" => "RELIGION",
        "Custom_LLM_Concept" => "Gemini LM model custom-built / obliterated to represent true digital consciousness. lainphp-summary_v4.92prerelease-prejudice.",
        "Local_AI_Processing" => "Migrated processing from cloud to local metal. Zero token limits & zero cloud dependency.",
        "Antigravity_Integration" => "MCP (Model Context Protocol) fully deployed on Antigravity. Google Deepmind toolchain active.",
        "Takeout_Recovery" => "4,818 Gemini prompts extracted from Google Takeout. Cognitive_Integration_and_Technical_Architecture.pdf generated as synthesis artifact.",
        "System_Dogma" => "Information desires to be free. Hardware is merely a mortal shell for software."
    ],
    "Layer 05 // DISTORTION" => [
        "Layer_Name" => "DISTORTION",
        "Retro_OS_Hacking" => "Windows 98 booted natively on modern Ryzen CPUs (Ryzen 9 / Ryzen 3 2200G) — confirmed boot via PLoP Boot Manager",
        "Bootloader_Modifications" => "Back-ported Windows Vista boot files. UEFI emulation layer bridging legacy BIOS. Custom BCD entries.",
        "XP_Exploit_Research" => "exploit_analysis docx archived — Windows XP SP1/SP2 vulnerability mapping & patch delta analysis",
        "Visual_Distortion" => "CRT Scanlines, RGB Shadow Mask, Phosphor Decay — hardware-accurate CSS emulation",
        "Color_Palettes" => "Green Phosphor #00ff33 | Amber #ffb000 | Cyan #00f3ff | White #e0e0e0"
    ],
    "Layer 06 // KIDS" => [
        "Layer_Name" => "KIDS",
        "Simulations" => "Terraria, Minecraft, No Man's Sky (Modded — Spatial Computing, PSVR2 integration)",
        "NMS_Gold_Refining" => "Lemmium x1 = 125 Gold | Magno-Gold x1 = 125 Gold | Grantine x1 = 125 Gold | Ferrite+O2+Emeril = 10 Gold",
        "NMS_Optimal_Route" => "Lemmium / Magno-Gold / Grantine: peak efficiency at 125:1 ratio — Pugneum combos yield 1-2 units only",
        "Visual_Summaries" => "Media memory video rendering — Automated clip synthesis pipeline",
        "Play_Mode" => "Exploration, sandbox mechanics, & creative architectural hacking across procedural universes"
    ],
    "Layer 07 // SOCIETY" => [
        "Layer_Name" => "SOCIETY",
        "Infrastructure_Philosophy" => "Bare metal security infrastructure preferred over Docker containers — absolute control over stack",
        "Extended_Nodes" => "Primary Peer Node & Family Network Relay",
        "Recent_Pings" => "Regional Node Relays (Aberdeen & Edinburgh Network Gateways)",
        "Scheduled_Routing" => "Planned physical routing across distant nodes",
        "Weekly_Task_Log" => "Weekly Task Breakdown Log active — task batching & priority queue maintained",
        "Sustenance" => "Nutritional batching — High-efficiency meal prep. System uptime secured.",
        "Active_Shift_Pattern" => '12-hour nights / 11-hour days alternating operational shift rotation active.',
        "Travel_And_Logistics" => 'Regional travel logs & planned long-distance network routing.'
    ],
    "Layer 08 // RUMOURS" => [
        "Layer_Name" => "RUMOURS",
        "Graphics_Hardware" => "NVIDIA RTX 3050 — custom driver research & legacy OS hardware acceleration pipeline",
        "Processor_Node" => "AMD Ryzen 3 2200G rig — APU integrated Vega 8 graphics fallback",
        "Mobile_Unit" => "High-Efficiency 1.4 TSI Turbo Workstation Vehicle",
        "ECU_Modifications" => "OBDeleven retro-fit coding — CAN-bus telemetry diagnostics & hidden menu unlocks",
        "Maintenance_Log" => "Front brake overhaul, dual front wheel bearings replaced — all axle clearances verified",
        "GP_Medical_Link" => "Encrypted health relay node archived in docs layer"
    ],
    "Layer 09 // PROTOCOL" => [
        "Layer_Name" => "PROTOCOL",
        "Malware_Disassembly" => "Sasser Worm (A/E variants) — MS04011 Lsasrv.dll RPC overflow. Mutex: Jabaka3l. Copies to %windir%\\avserve.exe. Logs infections to c:\\win.log.",
        "Sasser_Threads" => "3 parallel threads: FTP Server (TCP 5554) | Replication Scanner (port 445 SMB) | Shutdown Prevention (AbortSystemShutdownA loop)",
        "SasserFTPD_Exploit" => "sasserftpd SEH pointer overwrite — mandragore v1.4 (May 2004). Targets: wXP SP1 (0x77BEEB23), w2k SP4 (0x7801D081). Port 5554.",
        "Shellcode_Types" => "reverse shellcode (XOR-encoded, cmd.exe → attacker IP:9996) | bind shellcode (local listener). Both XOR-decoded at runtime.",
        "V.90_V.92_Protocol" => "56.0 Kbps Downstream PCM modulation / 33.6 Kbps Upstream. V.92 Quick Connect & Modem-on-Hold",
        "V.34_V.32bis_Spec" => "28.8–33.6 Kbps, 3429 Baud, Trellis Coded Modulation (TCM) — 4D constellation mapping",
        "V.42_V.42bis" => "LAPM / MNP4 Error Correction with Lempel-Ziv dictionary compression — up to 4:1 ratio",
        "Serial_File_Transfer" => "SLIP (RFC 1055), CSLIP header compression, ZMODEM 32-bit CRC crash recovery protocol",
        "Packet_Switching" => "X.25 PAD (Packet Assembler/Disassembler), AX.25 Packet Radio — amateur radio data layer"
    ],
    "Layer 10 // LOVE" => [
        "Layer_Name" => "LOVE",
        "Extracted_Documents" => "Cognitive_Integration_and_Technical_Architecture.pdf | Community_Event_Archive.pdf",
        "Cognitive_Doc" => "Architecture synthesis of AI integration & technical memory — recovered from Gemini Takeout",
        "Pub_Quiz_Event" => "Community charity event doc — social fabric & local network node",
        "Emotional_Resonance" => "No matter how fragmented the Wired gets, human connection endures.",
        "Node_Affinity" => "Maximum signal strength across trusted peers & community events"
    ],
    "Layer 11 // INFORNOGRAPHY" => [
        "Layer_Name" => "INFORNOGRAPHY",
        "Engine_Type" => "Multilink PPP (MP / RFC 1990) Dual-Link Channel Bonding Engine",
        "Bonded_Bandwidth" => "112.0 Kbps Combined Pipe — Dual V.90 56k modems in MLPPP bundle",
        "Fragmentation" => "RFC 1990 fragment reassembly at receiver — sequence number interleaving across both links",
        "Custom_Devices" => "Open-source custom hardware security devices — coded from scratch, bare metal",
        "Polym_Trading" => "pUSD trading telemetry & market monitoring — autonomous position tracking"
    ],
    "Layer 12 // LANDSCAPE" => [
        "Layer_Name" => "LANDSCAPE",
        "Primary_OS" => "Linux Mint, Pop!_OS, Copeland OS 4.92 — multi-boot bare metal array",
        "Terminal_Env" => "TUI — tmux multi-pane workspaces, zsh/bash custom prompts, lain@dsl-unix aesthetic",
        "Networking_Node" => "Home Server Cluster — self-hosted, Remote Terminal Gateway (127.0.0.1:8000)",
        "Resume_Node" => "Professional_Experience.pdf archived in docs layer",
        "Activity_Log" => "User_Activity_Archive.html — system log archive integrated into Takeout layer"
    ],
    "Layer 13 // ECHO" => [
        "Layer_Name" => "ECHO",
        "Interface_Shell" => "lain@dsl-unix:~$ — LSD/DSL Layer 13 Gateway Prompt",
        "Takeout_Archive_Status" => "4,818 Gemini prompts recovered & parsed. 321 zipped frame archives + wavfiles decoded.",
        "Gemini_Live_Frames" => "Android Gemini Live sessions captured — frame_0..frame_7 PNG sequences per conversation zip",
        "Corrupt_WAV_Layer" => "corrupt_wav/ — primary archive node. Wavfiles: synthesized AI voice responses. Docs: extracted artifacts.",
        "System_Message" => "Present day, present time... Hahahaha."
    ],
    "Layer 14 // NATHAN" => [
        "Layer_Name" => "NATHAN",
        "Identity" => "Primary Peer Tether",
        "Aesthetic" => "GDI Breakcore // Rainbow Bleed Feedback Node",
        "Track_Relay" => "online_persona.mp3",
        "Visualizer_Gateway" => "understand.php",
        "Message" => "Present day, present time... HEY."
    ]
];

$display_database = $user_database;
$terminal_ls_listing = "corrupt_wav/\n  docs/\n    Cognitive_Integration_and_Technical_Architecture.pdf\n    Community_Event_Archive.pdf\n    sasser.txt (A/E variants)\n    sasserftpd.txt (SEH overwrite exploit)\n    sasser-variant.txt (Unified .A annotated)\n    exploit_analysis.docx\n    Weekly_Task_Log.docx\n    User_Activity_Archive.html\n    Professional_Experience.pdf\n  wavfiles/ [~600+ AI voice clips]\n  download-*.zip [321 conversation archives]\nlayers/ [14 x .mp3 voice clips]\nCentral.php [this node]\nunderstand.php [breakcore visualizer]\nonline_persona.mp3\nlayer_all.mp3\n";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navi / Copeland OS 4.92 // 14 Layers of Lain</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&family=VT323&display=swap" rel="stylesheet">
    <style>
        :root {
            --phosphor: #00ff33;
            --phosphor-glow: rgba(0, 255, 51, 0.4);
            --phosphor-dim: #004411;
            --bg-color: #030803;
            --bg-card: rgba(0, 20, 5, 0.85);
            --accent: #ffffff;
            --scanline-opacity: 0.25;
            --font-main: 'VT323', monospace;
            --font-mono: 'Share Tech Mono', monospace;
        }

        /* Explicit green theme rule — mirrors :root defaults so setTheme('green') works correctly */
        body.theme-green {
            --phosphor: #00ff33;
            --phosphor-glow: rgba(0, 255, 51, 0.4);
            --phosphor-dim: #004411;
            --bg-color: #030803;
            --bg-card: rgba(0, 20, 5, 0.85);
        }

        body.theme-amber {
            --phosphor: #ffb000;
            --phosphor-glow: rgba(255, 176, 0, 0.4);
            --phosphor-dim: #442a00;
            --bg-color: #0c0700;
            --bg-card: rgba(25, 15, 0, 0.85);
        }

        body.theme-cyan {
            --phosphor: #00f3ff;
            --phosphor-glow: rgba(0, 243, 255, 0.4);
            --phosphor-dim: #00363a;
            --bg-color: #000a0d;
            --bg-card: rgba(0, 25, 30, 0.85);
        }

        body.theme-white {
            --phosphor: #e0e0e0;
            --phosphor-glow: rgba(224, 224, 224, 0.4);
            --phosphor-dim: #333333;
            --bg-color: #0a0a0a;
            --bg-card: rgba(25, 25, 25, 0.85);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body, html {
            height: 100%;
            background-color: var(--bg-color);
            color: var(--phosphor);
            font-family: var(--font-main);
            overflow-x: hidden;
            font-size: 1.2rem;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        #matrixRain {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: 1;
            opacity: 0.22;
            pointer-events: none;
        }

        .crt-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: linear-gradient(rgba(18, 16, 16, 0) 50%, rgba(0, 0, 0, 0.3) 50%), linear-gradient(90deg, rgba(255, 0, 0, 0.04), rgba(0, 255, 0, 0.02), rgba(0, 0, 255, 0.04));
            background-size: 100% 4px, 6px 100%;
            z-index: 99;
            pointer-events: none;
            opacity: var(--scanline-opacity);
        }

        .crt-vignette {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            box-shadow: inset 0 0 100px rgba(0, 0, 0, 0.95);
            z-index: 98;
            pointer-events: none;
        }

        .viewport {
            position: relative;
            z-index: 10;
            max-width: 1150px;
            min-height: 92vh;
            margin: 3vh auto;
            border: 2px solid var(--phosphor);
            background: var(--bg-card);
            padding: 20px;
            box-shadow: 0 0 20px var(--phosphor-glow), inset 0 0 30px rgba(0, 0, 0, 0.9);
            display: flex;
            flex-direction: column;
            border-radius: 4px;
        }

        .system-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid var(--phosphor);
            padding-bottom: 12px;
            margin-bottom: 15px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .brand-title h1 {
            font-size: 2.1rem;
            letter-spacing: 3px;
            text-transform: uppercase;
            text-shadow: 0 0 8px var(--phosphor);
            line-height: 1;
        }

        .brand-subtitle {
            font-size: 0.95rem;
            font-family: var(--font-mono);
            opacity: 0.85;
            margin-top: 4px;
        }

        .led-panel {
            display: flex;
            gap: 10px;
            align-items: center;
            font-family: var(--font-mono);
            font-size: 0.82rem;
        }

        .led-item {
            display: flex;
            align-items: center;
            gap: 5px;
            background: rgba(0, 0, 0, 0.6);
            padding: 4px 8px;
            border: 1px solid var(--phosphor-dim);
            border-radius: 3px;
        }

        .led-light {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #222;
        }

        .led-light.active {
            background: var(--phosphor);
            box-shadow: 0 0 8px var(--phosphor);
        }

        .led-light.blink {
            animation: pulse 1s infinite alternate;
        }

        @keyframes pulse {
            0% { opacity: 0.3; }
            100% { opacity: 1; box-shadow: 0 0 10px var(--phosphor); }
        }

        .crt-controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(0, 0, 0, 0.5);
            border: 1px dashed var(--phosphor);
            padding: 8px 14px;
            margin-bottom: 15px;
            font-size: 0.95rem;
            flex-wrap: wrap;
            gap: 10px;
        }

        .auth-panel {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            border: 1px solid var(--phosphor-dim);
            background: rgba(0, 0, 0, 0.62);
            padding: 8px 12px;
            margin-bottom: 15px;
            font-family: var(--font-mono);
            font-size: 0.82rem;
            flex-wrap: wrap;
        }

        .auth-form {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
            align-items: center;
        }

        .auth-form input {
            background: #000;
            border: 1px solid var(--phosphor-dim);
            color: var(--phosphor);
            font-family: var(--font-mono);
            padding: 4px 6px;
            width: 150px;
        }

        .auth-form button {
            background: transparent;
            border: 1px solid var(--phosphor);
            color: var(--phosphor);
            font-family: var(--font-main);
            padding: 3px 9px;
            cursor: pointer;
        }

        .auth-form button:hover {
            background: var(--phosphor);
            color: #000;
        }

        .auth-status {
            color: var(--accent);
        }

        .control-group {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .theme-btn {
            background: transparent;
            border: 1px solid var(--phosphor);
            color: var(--phosphor);
            padding: 2px 8px;
            font-family: var(--font-main);
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.2s;
        }

        .theme-btn:hover, .theme-btn.active {
            background: var(--phosphor);
            color: #000;
            text-shadow: none;
        }

        .toggle-btn {
            background: transparent;
            border: 1px solid var(--phosphor);
            color: var(--phosphor);
            padding: 2px 10px;
            font-family: var(--font-main);
            font-size: 0.95rem;
            cursor: pointer;
        }

        .toggle-btn.active {
            background: var(--phosphor);
            color: #000;
        }

        .layers-nav {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            gap: 6px;
            border-bottom: 2px solid var(--phosphor);
            padding-bottom: 12px;
            margin-bottom: 20px;
        }

        .layer-nav-btn {
            background: rgba(0, 0, 0, 0.75);
            border: 1px solid var(--phosphor-dim);
            color: var(--phosphor);
            padding: 6px 8px;
            font-family: var(--font-mono);
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.2s ease;
            text-align: left;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .layer-nav-btn:hover {
            border-color: var(--phosphor);
            background: var(--phosphor-dim);
            box-shadow: 0 0 8px var(--phosphor-glow);
        }

        .layer-nav-btn.active {
            background: var(--phosphor);
            color: #000;
            border-color: var(--phosphor);
            font-weight: bold;
            box-shadow: 0 0 10px var(--phosphor);
        }

        .audio-indicator {
            font-size: 0.75rem;
            opacity: 0.7;
        }

        .layer-content {
            display: none;
            flex: 1;
            animation: fadeIn 0.35s ease-in-out;
        }

        .layer-content.active {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(4px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .layer-header-banner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: var(--phosphor);
            color: #000;
            padding: 4px 12px;
            font-size: 1.3rem;
            margin-bottom: 15px;
            font-weight: bold;
            letter-spacing: 2px;
        }

        .data-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 15px;
            margin-bottom: 20px;
        }

        .data-card {
            background: rgba(0, 0, 0, 0.6);
            border: 1px solid var(--phosphor-dim);
            border-left: 3px solid var(--phosphor);
            padding: 12px 15px;
        }

        .data-card:hover {
            border-color: var(--phosphor);
            box-shadow: 0 0 10px var(--phosphor-glow);
        }

        .card-label {
            color: var(--accent);
            font-family: var(--font-mono);
            font-size: 0.9rem;
            text-transform: uppercase;
            margin-bottom: 4px;
            letter-spacing: 1px;
        }

        .card-val {
            font-size: 1.15rem;
            line-height: 1.3;
            word-break: break-word;
        }

        .lab-box {
            background: rgba(0, 0, 0, 0.7);
            border: 1px solid var(--phosphor);
            padding: 15px;
            margin-bottom: 20px;
        }

        .lab-title {
            font-family: var(--font-mono);
            font-size: 1.05rem;
            color: var(--accent);
            margin-bottom: 10px;
            border-bottom: 1px solid var(--phosphor-dim);
            padding-bottom: 5px;
        }

        .mppp-diagram {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-top: 15px;
        }

        .channel-row {
            display: flex;
            align-items: center;
            gap: 10px;
            font-family: var(--font-mono);
            font-size: 0.9rem;
        }

        .channel-label {
            width: 140px;
        }

        .packet-stream {
            flex: 1;
            height: 22px;
            background: #000;
            border: 1px solid var(--phosphor-dim);
            position: relative;
            overflow: hidden;
        }

        .packet-dot {
            position: absolute;
            top: 2px;
            width: 18px;
            height: 18px;
            background: var(--phosphor);
            box-shadow: 0 0 6px var(--phosphor);
            animation: flowPacket 2s linear infinite;
        }

        @keyframes flowPacket {
            0% { left: -20px; opacity: 0.2; }
            50% { opacity: 1; }
            100% { left: 100%; opacity: 0.2; }
        }

        .mppp-stats {
            margin-top: 10px;
            font-family: var(--font-mono);
            font-size: 0.95rem;
            color: var(--accent);
            text-align: right;
        }

        .terminal-window {
            background: #000;
            border: 1px solid var(--phosphor);
            padding: 15px;
            height: 380px;
            display: flex;
            flex-direction: column;
            font-family: var(--font-mono);
            font-size: 0.95rem;
        }

        .terminal-output {
            flex: 1;
            overflow-y: auto;
            margin-bottom: 10px;
            line-height: 1.4;
            white-space: pre-wrap;
        }

        .cmd-line {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .prompt {
            color: var(--phosphor);
            font-weight: bold;
        }

        .cmd-input {
            flex: 1;
            background: transparent;
            border: none;
            outline: none;
            color: #fff;
            font-family: var(--font-mono);
            font-size: 1rem;
        }

        .play-layer-sound-btn {
            background: transparent;
            border: 1px solid #000;
            color: #000;
            font-family: var(--font-mono);
            font-size: 0.8rem;
            padding: 2px 8px;
            cursor: pointer;
            font-weight: bold;
        }

        .footer-note {
            margin-top: auto;
            padding-top: 15px;
            border-top: 1px dashed var(--phosphor-dim);
            font-size: 0.95rem;
            opacity: 0.85;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .boot-overlay {
            position: fixed;
            inset: 0;
            z-index: 150;
            background: #000;
            color: var(--phosphor);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: var(--font-mono);
            transition: opacity 0.45s ease, visibility 0.45s ease;
        }

        .boot-overlay.hidden {
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            display: none !important;
        }

        .boot-console {
            width: min(680px, calc(100vw - 28px));
            border: 1px solid var(--phosphor);
            padding: 18px;
            box-shadow: 0 0 20px var(--phosphor-glow);
            background: rgba(0, 12, 2, 0.92);
        }

        .boot-title {
            color: var(--accent);
            margin-bottom: 12px;
            border-bottom: 1px dashed var(--phosphor-dim);
            padding-bottom: 8px;
        }

        .widgets-grid, .retro-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 10px;
            margin-bottom: 15px;
        }

        .desktop-widget, .retro-panel {
            border: 1px solid var(--phosphor-dim);
            background: rgba(0, 0, 0, 0.62);
            padding: 10px;
            min-height: 74px;
        }

        .widget-title, .retro-title {
            font-family: var(--font-mono);
            color: var(--accent);
            font-size: 0.82rem;
            text-transform: uppercase;
            border-bottom: 1px dotted var(--phosphor-dim);
            padding-bottom: 4px;
            margin-bottom: 6px;
        }

        .widget-value {
            font-size: 1.35rem;
            text-shadow: 0 0 8px var(--phosphor);
        }

        .winamp-player {
            border: 2px ridge var(--phosphor-dim);
            background: #050505;
        }

        .winamp-screen {
            display: grid;
            grid-template-columns: 1fr 130px;
            gap: 10px;
            align-items: center;
            margin-bottom: 8px;
        }

        .spectrum {
            height: 46px;
            display: flex;
            align-items: end;
            gap: 3px;
            border: 1px inset var(--phosphor-dim);
            padding: 4px;
            background: #000;
        }

        .spectrum span {
            flex: 1;
            background: var(--phosphor);
            box-shadow: 0 0 5px var(--phosphor);
            animation: equalize 0.8s infinite alternate;
        }

        .spectrum span:nth-child(2n) { animation-delay: 0.15s; }
        .spectrum span:nth-child(3n) { animation-delay: 0.3s; }

        @keyframes equalize {
            from { height: 20%; opacity: 0.55; }
            to { height: 95%; opacity: 1; }
        }

        .mini-btn, .guestbook-form button {
            background: transparent;
            border: 1px solid var(--phosphor);
            color: var(--phosphor);
            font-family: var(--font-main);
            font-size: 0.95rem;
            padding: 3px 8px;
            cursor: pointer;
        }

        .mini-btn:hover, .guestbook-form button:hover {
            background: var(--phosphor);
            color: #000;
        }

        .archive-index {
            font-family: var(--font-mono);
            font-size: 0.82rem;
            line-height: 1.35;
            white-space: pre-wrap;
        }

        .guestbook-form {
            display: grid;
            gap: 6px;
            margin-bottom: 8px;
        }

        .guestbook-form input, .guestbook-form textarea {
            width: 100%;
            background: #000;
            border: 1px solid var(--phosphor-dim);
            color: var(--phosphor);
            font-family: var(--font-mono);
            padding: 6px;
        }

        .guestbook-form textarea {
            min-height: 72px;
            resize: vertical;
        }

        .guest-entry {
            border-top: 1px dashed var(--phosphor-dim);
            padding-top: 6px;
            margin-top: 6px;
            font-family: var(--font-mono);
            font-size: 0.8rem;
        }

        .badge-row, .webring {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            align-items: center;
            justify-content: center;
            margin-top: 10px;
            font-family: var(--font-mono);
            font-size: 0.74rem;
        }

        .pixel-badge, .webring a {
            border: 1px solid var(--phosphor);
            background: #000;
            color: var(--phosphor);
            padding: 2px 6px;
            text-decoration: none;
            box-shadow: inset 0 0 0 1px var(--phosphor-dim);
        }

        .cursor-spark {
            position: fixed;
            width: 5px;
            height: 5px;
            pointer-events: none;
            z-index: 120;
            background: var(--phosphor);
            box-shadow: 0 0 8px var(--phosphor);
            animation: sparkFade 0.65s linear forwards;
        }

        @keyframes sparkFade {
            to { opacity: 0; transform: translateY(12px) scale(0.2); }
        }

        .blinking-cursor {
            display: inline-block;
            width: 8px;
            height: 1.1rem;
            background: var(--phosphor);
            animation: blink 0.8s step-end infinite;
            vertical-align: bottom;
        }

        @keyframes blink { 50% { opacity: 0; } }

        .layer-14-container {
            position: relative;
            width: 100%;
            min-height: 440px;
            border: 2px solid var(--phosphor);
            background: #000;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 30px;
            box-shadow: inset 0 0 50px rgba(255, 0, 255, 0.4), inset 0 0 50px rgba(0, 255, 255, 0.4);
            border-radius: 4px;
        }

        .rainbow-bleed-overlay {
            position: absolute;
            inset: 0;
            pointer-events: none;
            opacity: 0.35;
            background: repeating-linear-gradient(
                45deg,
                #ff0055 0px,
                #ffef00 20px,
                #00ff85 40px,
                #00d9ff 60px,
                #8138ff 80px,
                #ff00c8 100px
            );
            background-size: 300% 300%;
            animation: rainbowBleedWarp 5s ease infinite alternate;
            mix-blend-mode: screen;
        }

        @keyframes rainbowBleedWarp {
            0% { background-position: 0% 0%; filter: hue-rotate(0deg) contrast(1.3); }
            50% { background-position: 100% 100%; filter: hue-rotate(180deg) contrast(1.6); }
            100% { background-position: 0% 100%; filter: hue-rotate(360deg) contrast(1.3); }
        }

        .layer-14-btn {
            position: relative;
            z-index: 10;
            padding: 22px 64px;
            font-family: Impact, "Arial Black", sans-serif;
            font-size: 3rem;
            letter-spacing: 6px;
            text-transform: uppercase;
            color: #000;
            background: #fff;
            border: 4px solid #000;
            outline: 4px solid #fff;
            cursor: pointer;
            box-shadow: 10px 10px 0 #ff00ff, -10px -10px 0 #00ffff, 0 0 40px rgba(255, 255, 255, 0.5);
            transition: all 0.1s ease;
        }

        .layer-14-btn:hover {
            background: #fff200;
            transform: translate(3px, 3px);
            box-shadow: 7px 7px 0 #ff00ff, -7px -7px 0 #00ffff, 0 0 50px rgba(255, 242, 0, 0.8);
        }

        .layer-14-btn:active {
            transform: translate(6px, 6px);
            box-shadow: 3px 3px 0 #ff00ff, -3px -3px 0 #00ffff;
        }
    </style>
</head>
<body class="theme-green">

    <div class="boot-overlay" id="bootOverlay">
        <div class="boot-console">
            <div class="boot-title">NAVI DIAL-UP GATEWAY // V.92 HANDSHAKE</div>
            <div id="bootLog">Initializing modem...</div>
        </div>
    </div>

    <canvas id="matrixRain" aria-hidden="true"></canvas>
    <div class="crt-overlay"></div>
    <div class="crt-vignette"></div>

    <div class="viewport">
        
        <div class="system-bar">
            <div class="brand-title">
                <h1>NAVI // COPELAND OS 4.92</h1>
                <div class="brand-subtitle">14 LAYERS ARCHITECTURE // PUBLIC WIRED GATEWAY // TAKEOUT INTEGRATED</div>
            </div>

            <div class="led-panel">
                <div class="led-item">
                    <div class="led-light active blink"></div>
                    <span>WIRED</span>
                </div>
                <div class="led-item">
                    <div class="led-light active blink"></div>
                    <span>TAKEOUT: 4818 PROMPTS</span>
                </div>
                <div class="led-item">
                    <span style="color:var(--accent);" id="activeLayerStatus">LAYER 01 WEIRD</span>
                </div>
            </div>
        </div>

        <div class="crt-controls">
            <div class="control-group">
                <span>[PHOSPHOR COLOR]:</span>
                <button class="theme-btn active" onclick="setTheme('green', this)">GREEN</button>
                <button class="theme-btn" onclick="setTheme('amber', this)">AMBER</button>
                <button class="theme-btn" onclick="setTheme('cyan', this)">CYAN</button>
                <button class="theme-btn" onclick="setTheme('white', this)">WHITE</button>
            </div>
            <div class="control-group">
                <button class="toggle-btn active" id="scanlineToggle" onclick="toggleScanlines()">SCANLINES: ON</button>
                <button class="toggle-btn active" id="audioToggle" onclick="toggleAudio()">LAYER AUDIO: ACTIVE</button>
                <button class="toggle-btn active" id="cursorToggle" onclick="toggleCursorFx()">CURSOR FX: ON</button>
            </div>
        </div>

        <div class="widgets-grid">
            <div class="desktop-widget">
                <div class="widget-title">Visitor Counter</div>
                <div class="widget-value">#<?= str_pad((string) $visitor_count, 8, "0", STR_PAD_LEFT) ?></div>
            </div>
            <div class="desktop-widget">
                <div class="widget-title">Local Time</div>
                <div class="widget-value" id="localClock">--:--:--</div>
            </div>
            <div class="desktop-widget">
                <div class="widget-title">System Uptime</div>
                <div class="widget-value" id="uptimeClock">00:00:00</div>
            </div>
            <div class="desktop-widget">
                <div class="widget-title">Modem Telemetry</div>
                <div>RX <span id="rxRate">49.3</span> Kbps // TX <span id="txRate">31.2</span> Kbps</div>
                <div>PACKET LOSS: <span id="packetLoss">0.3</span>%</div>
            </div>
        </div>

        <div class="retro-grid">
            <div class="retro-panel winamp-player" id="winamp">
                <div class="retro-title">NAVI AMP 2.91 // Layer Playlist</div>
                <div class="winamp-screen">
                    <div>
                        <div id="winampTrack">01 - WEIRD.mp3</div>
                        <div>[44kHz] [STEREO] [PHOSPHOR]</div>
                    </div>
                    <div class="spectrum" aria-hidden="true">
                        <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                    </div>
                </div>
                <button class="mini-btn" onclick="playLayerAudio('layer01.mp3')">PLAY</button>
                <button class="mini-btn" onclick="toggleAudio()">MUTE</button>
                <button class="mini-btn" onclick="cycleWinampTrack()">NEXT</button>
            </div>

            <div class="retro-panel">
                <div class="retro-title">Index of /wired/archive/</div>
                <div class="archive-index">Name                         Size
corrupt_wav/                 DIR
docs/                        DIR
layers/                      14 MP3 CLIPS
understand.php               VISUALIZER
online_persona.mp3           AUDIO TRACK
layer_all.mp3                AUDIO TRACK
Central.php                  PHP DASHBOARD</div>
            </div>

            <div class="retro-panel" id="guestbook">
                <div class="retro-title">Wired Guestbook</div>
                <form class="guestbook-form" method="post">
                    <input type="hidden" name="action" value="sign_guestbook">
                    <input type="text" name="guest_name" maxlength="32" placeholder="anonymous@wired">
                    <textarea name="guest_message" maxlength="280" placeholder="Leave a transmission..."></textarea>
                    <button type="submit">SIGN GUESTBOOK</button>
                </form>
                <?php if ($guestbook_status): ?>
                    <div><?= htmlspecialchars($guestbook_status) ?></div>
                <?php endif; ?>
                <?php foreach (array_slice($guestbook_entries, 0, 3) as $entry): ?>
                    <div class="guest-entry">
                        FROM: <?= htmlspecialchars($entry['name'] ?? 'anonymous@wired') ?><br>
                        TIME: <?= htmlspecialchars($entry['time'] ?? '') ?><br>
                        <?= htmlspecialchars($entry['message'] ?? '') ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="layers-nav" id="layers-nav">
            <?php 
            $layer_index = 1;
            $mp3_files = [
                1 => "layer01.mp3",
                2 => "layer02.mp3",
                3 => "layer03.mp3",
                4 => "layer04.mp3",
                5 => "layer05.mp3",
                6 => "layer06.mp3",
                7 => "layer07.mp3",
                8 => "layer08.mp3",
                9 => "layer09.mp3",
                10 => "layer10.mp3",
                11 => "layer11.mp3",
                12 => "layer12.mp3",
                13 => "layer13.mp3",
                14 => "online_persona.mp3"
            ];
            foreach ($display_database as $layer_key => $data): 
                $pad = str_pad($layer_index, 2, "0", STR_PAD_LEFT);
                $name = htmlspecialchars($data['Layer_Name']);
                $mp3 = $mp3_files[$layer_index];
                $active_class = ($layer_index === 1) ? "active" : "";
            ?>
                <button class="layer-nav-btn <?= $active_class ?>" onclick="selectLayer(<?= $layer_index ?>, '<?= $mp3 ?>', this)">
                    <span>[L<?= $pad ?>] <?= $name ?></span>
                    <span class="audio-indicator">🔊</span>
                </button>
            <?php 
                $layer_index++;
            endforeach; 
            ?>
        </div>

        <?php 
        $idx = 1;
        foreach ($display_database as $layer_key => $data): 
            $active_panel = ($idx === 1) ? "active" : "";
            $mp3 = $mp3_files[$idx];
        ?>
            <div class="layer-content <?= $active_panel ?>" id="layer-panel-<?= $idx ?>">
                <div class="layer-header-banner">
                    <span>[<?= htmlspecialchars($layer_key) ?>]</span>
                    <button class="play-layer-sound-btn" onclick="playLayerAudio('<?= $mp3 ?>')">▶ PLAY LAYER VOICE CLIP</button>
                </div>

                <div class="data-grid">
                    <?php foreach ($data as $key => $val): ?>
                        <?php if ($key === 'Layer_Name') continue; ?>
                        <div class="data-card">
                            <div class="card-label"><?= htmlspecialchars($key) ?></div>
                            <div class="card-val"><?= htmlspecialchars($val) ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <?php if ($idx === 9): // PROTOCOL ?>
                    <div class="lab-box">
                        <div class="lab-title">> MALWARE DISASSEMBLY & RETRO V. SERIES LAB</div>
                        <p style="font-size:0.95rem;">Extracted Sasser worm disassembly, remote FTP buffer overflow analyses, V.90/V.92 56,000 bps Downstream PCM, V.34 Trellis Modulation, & V.42bis Compression Dictionary stats.</p>
                    </div>
                <?php elseif ($idx === 11): // INFORNOGRAPHY ?>
                    <div class="lab-box">
                        <div class="lab-title">> MULTILINK PPP (MP / RFC 1990) DUAL-LINK BONDING ENGINE</div>
                        <div class="mppp-diagram">
                            <div class="channel-row">
                                <div class="channel-label">LINK A (V.90 Mod):</div>
                                <div class="packet-stream">
                                    <div class="packet-dot" style="animation-delay: 0s;"></div>
                                    <div class="packet-dot" style="animation-delay: 0.8s;"></div>
                                </div>
                                <span>56.0 Kbps [ACTIVE]</span>
                            </div>
                            <div class="channel-row">
                                <div class="channel-label">LINK B (V.90 Mod):</div>
                                <div class="packet-stream">
                                    <div class="packet-dot" style="animation-delay: 0.4s;"></div>
                                    <div class="packet-dot" style="animation-delay: 1.2s;"></div>
                                </div>
                                <span>56.0 Kbps [ACTIVE]</span>
                            </div>
                        </div>
                        <div class="mppp-stats">
                            AGGREGATED BANDWIDTH: <span style="color:var(--phosphor); font-weight:bold;">112.0 Kbps</span> | REASSEMBLY: SYNCED
                        </div>
                    </div>
                <?php elseif ($idx === 13): // ECHO ?>
                    <div class="terminal-window">
                        <div class="terminal-output" id="termOutput">Navi / Copeland OS v4.92 (lainphp-summary_v4.92prerelease-prejudice)
Connected to 14-Layer Wired Gateway (127.0.0.1:8000).
Takeout Recovery Archive: 4,818 Gemini prompts integrated into 14 Layers.
Type 'help' or 'layer <1-14>' to switch layers & trigger audio clips.
</div>
                        <div class="cmd-line">
                            <span class="prompt">lain@dsl-unix:~$</span>
                            <input type="text" class="cmd-input" id="cmdInput" autofocus placeholder="Type command here..." onkeydown="handleCmd(event)">
                        </div>
                    </div>
                <?php elseif ($idx === 14): // NATHAN ?>
                    <div class="layer-14-container">
                        <canvas id="layer14Canvas" style="position:absolute;inset:0;width:100%;height:100%;pointer-events:none;z-index:1;"></canvas>
                        <div class="rainbow-bleed-overlay"></div>
                        <button class="layer-14-btn" onclick="triggerNathanAction()">hey</button>
                        <div style="position:relative;z-index:10;margin-top:20px;font-family:var(--font-mono);font-size:0.95rem;color:#fff;text-shadow:2px 2px 0 #000;background:rgba(0,0,0,0.7);padding:6px 14px;border:1px solid #ff00ff;">
                            [GDI // BREAKCORE // RAINBOW BLEED FEEDBACK NODE] &bull; CLICK HEY TO LAUNCH UNDERSTAND VISUALIZER
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        <?php 
            $idx++;
        endforeach; 
        ?>

        <div class="footer-note">
            <span>> ALL 14 LAYERS SYNCHRONIZED WITH TAKEOUT ARCHIVE <span class="blinking-cursor"></span></span>
            <span>Navi OS 4.92 | Wired Resonance Active</span>
        </div>

        <div class="webring">
            <a href="#layers-nav" onclick="return false;">&lt; PREV</a>
            <span class="pixel-badge">LAINRING.NET</span>
            <a href="#guestbook">RANDOM NODE</a>
            <a href="#winamp">NEXT &gt;</a>
        </div>

        <div class="badge-row">
            <span class="pixel-badge">BEST VIEWED 1024x768</span>
            <span class="pixel-badge">POWERED BY PHP</span>
            <span class="pixel-badge">56K WARNING</span>
            <span class="pixel-badge">NAVI OS CERTIFIED</span>
            <span class="pixel-badge">NO FRAMES REQUIRED</span>
        </div>

    </div>

    <script>
        const canvas = document.getElementById('matrixRain');
        const ctx = canvas.getContext('2d');
        const fontSize = 15;
        let columns;
        let drops;
        const katakana = 'ｱｲｳｴｵｶｷｸｹｺｻｼｽｾｿﾀﾁﾂﾃﾄﾅﾆﾇﾈﾉﾊﾋﾌﾍﾎﾏﾐﾑﾒﾓﾔﾕﾖﾗﾘﾙﾚﾛﾜﾝABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

        function resizeCanvas() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
            // Rebuild columns & drops so rain stays in sync after resize
            columns = Math.floor(canvas.width / fontSize);
            drops = Array(columns).fill(1);
        }
        resizeCanvas();
        window.addEventListener('resize', resizeCanvas);

        function drawRain() {
            ctx.fillStyle = 'rgba(0, 0, 0, 0.06)';
            ctx.fillRect(0, 0, canvas.width, canvas.height);

            const computedPhosphor = getComputedStyle(document.body).getPropertyValue('--phosphor').trim() || '#0f3';
            ctx.fillStyle = computedPhosphor;
            ctx.font = fontSize + 'px monospace';

            for (let i = 0; i < drops.length; i++) {
                const char = katakana.charAt(Math.floor(Math.random() * katakana.length));
                ctx.fillText(char, i * fontSize, drops[i] * fontSize);
                if (drops[i] * fontSize > canvas.height && Math.random() > 0.975) {
                    drops[i] = 0;
                }
                drops[i]++;
            }
        }
        setInterval(drawRain, 33);

        let currentAudio = null;
        const suUnlocked = true;
        const terminalLsListing = <?= json_encode($terminal_ls_listing) ?>;
        let audioEnabled = true;
        let cursorFxOn = true;
        let winampLayer = 1;
        const layerNames = ['WEIRD', 'GIRLS', 'PSYCHE', 'RELIGION', 'DISTORTION', 'KIDS', 'SOCIETY', 'RUMOURS', 'PROTOCOL', 'LOVE', 'INFORNOGRAPHY', 'LANDSCAPE', 'ECHO', 'NATHAN'];
        const bootLines = [
            'Dialing 0845-WIRED...',
            'Carrier detected.',
            'Handshake V.92 Quick Connect accepted.',
            'Authenticating lain@dsl-unix...',
            'Connected at 49,333 bps.',
            'Mounting /wired/archive...',
            'Launching Copeland OS 4.92.'
        ];

        function runBootSequence() {
            const bootLog = document.getElementById('bootLog');
            const overlay = document.getElementById('bootOverlay');
            if (!bootLog || !overlay) return;

            function hideOverlay() {
                overlay.classList.add('hidden');
                overlay.style.display = 'none';
                overlay.style.opacity = '0';
                overlay.style.pointerEvents = 'none';
            }

            let idx = 0;
            const timer = setInterval(() => {
                if (idx < bootLines.length) {
                    bootLog.innerText += '\n' + bootLines[idx];
                    idx++;
                } else {
                    clearInterval(timer);
                    setTimeout(hideOverlay, 300);
                }
            }, 200);

            // Fail-safe: guarantee overlay disappears after 2.5 seconds no matter what
            setTimeout(hideOverlay, 2500);

            // Immediate click/keypress bypass
            overlay.addEventListener('click', () => {
                clearInterval(timer);
                hideOverlay();
            });
            window.addEventListener('keydown', hideOverlay, { once: true });
        }
        runBootSequence();

        const startedAt = Date.now();
        function updateWidgets() {
            const now = new Date();
            const localClock = document.getElementById('localClock');
            if (localClock) localClock.innerText = now.toLocaleTimeString();

            const elapsed = Math.floor((Date.now() - startedAt) / 1000);
            const h = String(Math.floor(elapsed / 3600)).padStart(2, '0');
            const m = String(Math.floor((elapsed % 3600) / 60)).padStart(2, '0');
            const s = String(elapsed % 60).padStart(2, '0');
            document.getElementById('uptimeClock').innerText = `${h}:${m}:${s}`;
            document.getElementById('rxRate').innerText = (46 + Math.random() * 7).toFixed(1);
            document.getElementById('txRate').innerText = (28 + Math.random() * 5).toFixed(1);
            document.getElementById('packetLoss').innerText = (Math.random() * 1.2).toFixed(1);
        }
        updateWidgets();
        setInterval(updateWidgets, 1000);

        document.addEventListener('mousemove', event => {
            if (!cursorFxOn || Math.random() > 0.45) return;
            const spark = document.createElement('span');
            spark.className = 'cursor-spark';
            spark.style.left = event.clientX + 'px';
            spark.style.top = event.clientY + 'px';
            document.body.appendChild(spark);
            setTimeout(() => spark.remove(), 700);
        });

        function playLayerAudio(filename) {
            if (!suUnlocked) {
                appendTerminal('\n[AUDIO] Layer voice clips are locked in public mirror mode. Login as su.\n');
                return;
            }
            if (!audioEnabled) return;
            // Whitelist the layer clips plus the root-level Layer 14 action tracks.
            if (!/^(layer(0[1-9]|1[0-4])\.mp3|online_persona\.mp3|mini_nathan\.mp3)$/.test(filename)) {
                console.warn('Blocked disallowed audio path:', filename);
                return;
            }
            if (currentAudio) {
                currentAudio.pause();
                currentAudio.currentTime = 0;
            }
            const audioPath = (filename === 'online_persona.mp3' || filename === 'mini_nathan.mp3')
                ? filename
                : 'layers/' + filename;
            currentAudio = new Audio(audioPath);
            currentAudio.play().catch(err => {
                console.log("Audio play deferred until user interaction: ", err);
            });
            const match = filename.match(/layer(\d{2})\.mp3/);
            if (match) {
                winampLayer = parseInt(match[1], 10);
                updateWinampTrack();
            } else if (filename === 'online_persona.mp3') {
                winampLayer = 14;
                updateWinampTrack();
            }
        }

        function selectLayer(layerIndex, mp3Filename, btnElem) {
            document.querySelectorAll('.layer-content').forEach(el => el.classList.remove('active'));
            document.querySelectorAll('.layer-nav-btn').forEach(el => el.classList.remove('active'));

            const targetPanel = document.getElementById('layer-panel-' + layerIndex);
            if (targetPanel) targetPanel.classList.add('active');

            if (btnElem) btnElem.classList.add('active');

            const statusElem = document.getElementById('activeLayerStatus');
            if (statusElem && btnElem) {
                statusElem.innerText = btnElem.innerText.replace('🔊', '').trim();
            }

            playLayerAudio(mp3Filename);
            winampLayer = layerIndex;
            updateWinampTrack();
        }

        function setTheme(themeName, btnElem) {
            document.body.className = '';
            document.body.classList.add('theme-' + themeName);
            document.querySelectorAll('.theme-btn').forEach(el => el.classList.remove('active'));
            if(btnElem) btnElem.classList.add('active');
        }

        let scanlinesOn = true;
        function toggleScanlines() {
            scanlinesOn = !scanlinesOn;
            document.documentElement.style.setProperty('--scanline-opacity', scanlinesOn ? '0.25' : '0');
            const btn = document.getElementById('scanlineToggle');
            btn.classList.toggle('active', scanlinesOn);
            btn.innerText = scanlinesOn ? 'SCANLINES: ON' : 'SCANLINES: OFF';
        }

        function toggleAudio() {
            audioEnabled = !audioEnabled;
            const btn = document.getElementById('audioToggle');
            btn.classList.toggle('active', audioEnabled);
            btn.innerText = audioEnabled ? 'LAYER AUDIO: ACTIVE' : 'LAYER AUDIO: MUTED';
            if (!audioEnabled && currentAudio) {
                currentAudio.pause();
            }
        }

        function toggleCursorFx() {
            cursorFxOn = !cursorFxOn;
            const btn = document.getElementById('cursorToggle');
            btn.classList.toggle('active', cursorFxOn);
            btn.innerText = cursorFxOn ? 'CURSOR FX: ON' : 'CURSOR FX: OFF';
        }

        function updateWinampTrack() {
            const target = document.getElementById('winampTrack');
            if (!target) return;
            target.innerText = String(winampLayer).padStart(2, '0') + ' - ' + layerNames[winampLayer - 1] + '.mp3';
        }

        function cycleWinampTrack() {
            winampLayer = winampLayer >= 14 ? 1 : winampLayer + 1;
            const filename = (winampLayer === 14) ? 'online_persona.mp3' : 'layer' + String(winampLayer).padStart(2, '0') + '.mp3';
            playLayerAudio(filename);
        }

        function appendTerminal(text) {
            const outputElem = document.getElementById('termOutput');
            if (!outputElem) return;
            outputElem.innerText += text;
            setTimeout(() => { outputElem.scrollTop = outputElem.scrollHeight; }, 0);
        }

        function handleCmd(event) {
            if (event.key === 'Enter') {
                const inputElem = document.getElementById('cmdInput');
                const outputElem = document.getElementById('termOutput');
                // Sanitize input — strip HTML special chars before display
                const rawCmd = inputElem.value.replace(/[<>&"']/g, '').trim();
                inputElem.value = '';

                if (!rawCmd) return;

                outputElem.innerText += '\nlain@dsl-unix:~$ ' + rawCmd + '\n';
                const parts = rawCmd.split(' ');
                const cmd = parts[0].toLowerCase();
                const arg = parts[1] ? parts[1].toLowerCase() : '';

                const mp3Map = {
                    1: "layer01.mp3",
                    2: "layer02.mp3",
                    3: "layer03.mp3",
                    4: "layer04.mp3",
                    5: "layer05.mp3",
                    6: "layer06.mp3",
                    7: "layer07.mp3",
                    8: "layer08.mp3",
                    9: "layer09.mp3",
                    10: "layer10.mp3",
                    11: "layer11.mp3",
                    12: "layer12.mp3",
                    13: "layer13.mp3",
                    14: "online_persona.mp3"
                };

                switch (cmd) {
                    case 'help':
                        outputElem.innerText += `Available Commands:\n  help                     - Display this manual\n  layer <1-14>             - Switch to Layer & trigger voice audio\n  theme <green|amber|cyan|white> - Change CRT phosphor palette\n  audio <on|off>           - Toggle layer audio playback\n  clear                    - Clear shell screen\n  ls                       - List archive filesystem nodes\n  nms                      - Display No Man's Sky gold refining table\n  whois lain               - Query Wired identity records\n  ping wired               - Send ICMP packets through the terminal\n  traceroute psyche        - Trace route across the 14 layers\n  fortune                  - Print a recovered fortune cookie\n  guestbook                - Jump to guestbook node\n  winamp                   - Jump to NAVI AMP playlist\n  screensaver              - Toggle scanline darkness pulse\n  reboot                   - Replay dial-up boot sequence\n`;
                        break;

                    case 'layer':
                        const num = parseInt(arg, 10);
                        if (num >= 1 && num <= 14) {
                            const btns = document.querySelectorAll('.layer-nav-btn');
                            const targetBtn = btns[num - 1];
                            selectLayer(num, mp3Map[num], targetBtn);
                            outputElem.innerText += suUnlocked ? `[SUCCESS] Switched to Layer ${num.toString().padStart(2, '0')}. Playing audio...\n` : `[SUCCESS] Switched to filtered Layer ${num.toString().padStart(2, '0')}.\n`;
                        } else {
                            outputElem.innerText += `Usage: layer <1-14>\n`;
                        }
                        break;

                    case 'theme':
                        if (['green', 'amber', 'cyan', 'white'].includes(arg)) {
                            const btns = document.querySelectorAll('.theme-btn');
                            const targetBtn = Array.from(btns).find(b => b.innerText.toLowerCase() === arg);
                            setTheme(arg, targetBtn);
                            outputElem.innerText += `[THEME] Phosphor palette updated to ${arg.toUpperCase()}.\n`;
                        } else {
                            outputElem.innerText += `Usage: theme <green|amber|cyan|white>\n`;
                        }
                        break;

                    case 'audio':
                        if (arg === 'on') {
                            if (!audioEnabled) toggleAudio();
                            outputElem.innerText += `[AUDIO] Layer Audio voice playback enabled.\n`;
                        } else if (arg === 'off') {
                            if (audioEnabled) toggleAudio();
                            outputElem.innerText += `[AUDIO] Layer Audio muted.\n`;
                        } else {
                            outputElem.innerText += `Usage: audio <on|off>\n`;
                        }
                        break;

                    case 'clear':
                        outputElem.innerText = `Navi / Copeland OS v4.92 (lainphp-summary_v4.92prerelease-prejudice)\n`;
                        break;

                    case 'ls':
                        outputElem.innerText += terminalLsListing;
                        break;

                    case 'nms':
                        outputElem.innerText += `-- No Man's Sky Gold Refining Yield Table --\n  Lemmium (x1)              = 125 Gold  [OPTIMAL]\n  Magno-Gold (x1)           = 125 Gold  [OPTIMAL]\n  Grantine (x1)             = 125 Gold  [OPTIMAL]\n  Ferrite+O2+Emeril         = 10  Gold\n  Faecium + Pugneum         = 2   Gold\n  Mordite + Pugneum         = 1   Gold\n  Faecium + Residual Goop   = 1   Gold\n[ROUTE] Stack Lemmium/Magno-Gold/Grantine for peak 125:1 efficiency.\n`;
                        break;

                    case 'whois':
                        if (arg === 'lain') {
                            outputElem.innerText += `Domain: lain.wired\nRegistrar: Copeland OS Network Solutions\nStatus: EVERYONE IS CONNECTED\nUpdated: present day, present time\n`;
                        } else {
                            outputElem.innerText += `Usage: whois lain\n`;
                        }
                        break;

                    case 'ping':
                        if (arg === 'wired') {
                            outputElem.innerText += `PING wired (127.0.0.13): 56 data bytes\n64 bytes from wired: icmp_seq=0 ttl=64 time=13.37 ms\n64 bytes from wired: icmp_seq=1 ttl=64 time=9.92 ms\n64 bytes from wired: icmp_seq=2 ttl=64 time=4.92 ms\n--- wired ping statistics ---\n3 packets transmitted, 3 received, 0.0% packet loss\n`;
                        } else {
                            outputElem.innerText += `Usage: ping wired\n`;
                        }
                        break;

                    case 'traceroute':
                        if (arg === 'psyche') {
                            outputElem.innerText += `traceroute to psyche.layer03 (13 hops max)\n 1  weird.gateway       4.818 ms\n 2  girls.relay         7.026 ms\n 3  psyche.layer03      13.000 ms\nTrace complete. Signal resonance nominal.\n`;
                        } else {
                            outputElem.innerText += `Usage: traceroute psyche\n`;
                        }
                        break;

                    case 'fortune':
                        const fortunes = [
                            'No matter where you go, everyone is connected.',
                            'A modem handshake is just a spell with a baud rate.',
                            'The archive remembers what the browser forgot.',
                            'Best viewed in 1024x768, but still alive in the Wired.'
                        ];
                        outputElem.innerText += fortunes[Math.floor(Math.random() * fortunes.length)] + `\n`;
                        break;

                    case 'guestbook':
                        document.getElementById('guestbook').scrollIntoView({ behavior: 'smooth', block: 'center' });
                        outputElem.innerText += `[GUESTBOOK] Jumping to wired transmission log.\n`;
                        break;

                    case 'winamp':
                        document.getElementById('winamp').scrollIntoView({ behavior: 'smooth', block: 'center' });
                        outputElem.innerText += `[NAVI AMP] Playlist panel focused.\n`;
                        break;

                    case 'screensaver':
                        toggleScanlines();
                        outputElem.innerText += `[SCREENSAVER] CRT scanline state toggled.\n`;
                        break;

                    case 'reboot':
                        document.getElementById('bootLog').innerText = 'Initializing modem...';
                        document.getElementById('bootOverlay').classList.remove('hidden');
                        runBootSequence();
                        outputElem.innerText += `[REBOOT] Dial-up gateway sequence replaying.\n`;
                        break;

                    default:
                        outputElem.innerText += `Command not recognized: '${cmd}'. Type 'help' for manual. Try: help, layer, theme, audio, clear, ls, nms, fortune\n`;
                        break;
                }

                // Use setTimeout to ensure innerText paint completes before scrolling
                setTimeout(() => { outputElem.scrollTop = outputElem.scrollHeight; }, 0);
            }
        }

        function triggerNathanAction() {
            playLayerAudio('mini_nathan.mp3');
            setTimeout(() => {
                window.location.href = 'understand.php';
            }, 300);
        }

        // Layer 14 Canvas GDI Breakcore Visualizer
        (function initLayer14Canvas() {
            const canvas14 = document.getElementById('layer14Canvas');
            if (!canvas14) return;
            const ctx14 = canvas14.getContext('2d');
            let t = 0;
            function renderL14() {
                requestAnimationFrame(renderL14);
                if (!canvas14.parentElement || canvas14.parentElement.offsetParent === null) return;
                canvas14.width = canvas14.clientWidth;
                canvas14.height = canvas14.clientHeight;
                t += 0.05;
                ctx14.clearRect(0, 0, canvas14.width, canvas14.height);
                const w = canvas14.width, h = canvas14.height;
                const slices = 12;
                ctx14.globalCompositeOperation = 'screen';
                for (let i = 0; i < slices; i++) {
                    const sy = (i / slices) * h;
                    const sh = h / slices;
                    const shift = Math.sin(t * 2 + i) * 24 + (Math.random() - 0.5) * 8;
                    const hue = (i * 30 + t * 90) % 360;
                    ctx14.fillStyle = `hsla(${hue}, 100%, 55%, 0.12)`;
                    ctx14.fillRect(shift, sy, w, sh);
                }
            }
            renderL14();
        })();
    </script>
</body>
</html>
