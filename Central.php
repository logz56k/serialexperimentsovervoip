<?php
// --- NAVI / COPELAND OS DATABASE (PHP Backend) ---
// Categorized in Serial Experiments Lain "Layer" Architecture
$user_database = [
    "Layer 01 // IDENTITY_CORE" => [
        "Status" => "Connected to The Wired",
        "Clearance" => "Level 6 Computing / Cybersecurity / Dial-Up Specialist",
        "Age_Cycle" => "20 (Milestone: July 2026)",
        "Designation" => "First-line IT Support (MoD / Capgemini / Manpower)",
        "Previous_Node" => "Bristol and Sutor",
        "Uptime_Schedule" => "Rotating 12h night / 11h day shifts (Active to July 31, 2027)",
        "Core_Philosophy" => "No matter where you go, everyone is connected."
    ],
    "Layer 02 // SYSTEM_ENVIRONMENT" => [
        "Primary_OS" => "Linux Mint, Pop!_OS, Copeland OS 4.92",
        "Terminal_Env" => "TUI, tmux multi-pane workspaces, zsh/bash custom prompts",
        "Protocols_Active" => "SSH Tunnels, SLIP/PPP, MPPP (RFC 1990), Package Debugging",
        "Networking_Node" => "Home Server Cluster (Self-hosted, Remote Terminal Gateway)",
        "Shell_Identifier" => "lain@dsl-unix:~$ (LSD/DSL Layer 07 Bridge)"
    ],
    "Layer 03 // RETRO_NETWORKING & DIALUP_LAB" => [
        "V.90 / V.92 Protocol" => "56.0 Kbps Downstream (PCM modulation) / 33.6 Kbps Upstream (V.34 Annex A). V.92 Quick Connect & Modem-On-Hold support",
        "V.34 / V.32bis Protocol" => "28.8 Kbps to 33.6 Kbps, 3429 Baud symbol rate, Trellis Coded Modulation (TCM), adaptive line probing",
        "V.42 / V.42bis Error & Comp" => "LAPM / MNP4 Error Correction with Lempel-Ziv dictionary data compression (Up to 4:1 compression ratio)",
        "Multilink PPP (RFC 1990)" => "Bundling multiple physical links (Dual V.90 56k = 112Kbps or Dual ISDN 64k B-Channels = 128Kbps). Fragment sequencing & reassembly",
        "Legacy Transfer Protocols" => "ZMODEM (Auto-start, Crash Recovery, 32-bit CRC), XMODEM-1K, YMODEM-G, Kermit sliding windows",
        "Packet Switching & Serial" => "SLIP (RFC 1055), CSLIP header compression, X.25 PAD (Packet Assembler/Disassembler), AX.25 Packet Radio"
    ],
    "Layer 04 // HARDWARE_LINK" => [
        "Mobile_Unit" => "2017 SEAT Leon 1.4 TSI Excellence",
        "ECU_Modifications" => "OBDeleven retro-fit coding, CAN-bus telemetry diagnostics",
        "Maintenance_Log" => "Front brake overhaul, dual front wheel bearings replaced (June 2026)",
        "Hardware_Rigs" => "Custom Cyberia Workstation, CRT Phosphor Monitor (100Hz vertical refresh)"
    ],
    "Layer 05 // MEDIA_STREAM" => [
        "Audio_Frequencies" => "Breakcore, Happy Hardcore, Web-Core, J-Core, Synthwave",
        "Key_Transmissions" => "Aphex Twin ('Polynomial-C', 'Ageispolis'), BOA ('Duvet')",
        "Visual_Feeds" => "Serial Experiments Lain (1998), Cyberpunk aesthetics, retro CRT UI",
        "Simulations" => "Terraria, Minecraft, No Man's Sky (Modded, VR/MR spatial computing)"
    ],
    "Layer 06 // EXTERNAL_NODES" => [
        "Recent_Pings" => "Aberdeen (July 2026), Edinburgh node (Father relay link)",
        "Scheduled_Routing" => "Claudia Sanders Dinner House, KY (Planned physical routing)",
        "Network_Nodes" => "Chloe, Nathan Black (Former Roommate), Mother, Father",
        "Life_Sustenance" => "Morphy Richards soup cooker (Leek, Potato, Onion batching)"
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navi / Copeland OS 4.92 // lainphp-summary_v4.92prerelease-prejudice</title>
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
            --alert-red: #ff3344;
            --scanline-opacity: 0.25;
            --font-main: 'VT323', monospace;
            --font-mono: 'Share Tech Mono', monospace;
        }

        /* Color Themes */
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
            font-size: 1.25rem;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        /* Canvas background */
        #matrixRain {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: 1;
            opacity: 0.25;
            pointer-events: none;
        }

        /* CRT Overlay Effects */
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

        /* Main Container */
        .viewport {
            position: relative;
            z-index: 10;
            max-width: 1100px;
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

        /* Top System Banner & LED Indicators */
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
            font-size: 2.2rem;
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
            gap: 12px;
            align-items: center;
            font-family: var(--font-mono);
            font-size: 0.85rem;
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
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: #222;
            box-shadow: 0 0 2px #000;
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

        /* Controls Panel (CRT Adjustments) */
        .crt-controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(0, 0, 0, 0.5);
            border: 1px dashed var(--phosphor);
            padding: 8px 14px;
            margin-bottom: 15px;
            font-size: 1rem;
            flex-wrap: wrap;
            gap: 10px;
        }

        .control-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .theme-btn {
            background: transparent;
            border: 1px solid var(--phosphor);
            color: var(--phosphor);
            padding: 2px 8px;
            font-family: var(--font-main);
            font-size: 1rem;
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
            font-size: 1rem;
            cursor: pointer;
        }

        .toggle-btn.active {
            background: var(--phosphor);
            color: #000;
        }

        /* Layer Navigation Bar (Tabs) */
        .layer-tabs {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            border-bottom: 2px solid var(--phosphor);
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .tab-btn {
            background: rgba(0, 0, 0, 0.7);
            border: 1px solid var(--phosphor);
            color: var(--phosphor);
            padding: 6px 12px;
            font-family: var(--font-mono);
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.2s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .tab-btn:hover {
            background: var(--phosphor-dim);
            box-shadow: 0 0 8px var(--phosphor-glow);
        }

        .tab-btn.active {
            background: var(--phosphor);
            color: #000;
            font-weight: bold;
            box-shadow: 0 0 12px var(--phosphor);
            border-color: var(--phosphor);
        }

        /* Layer Content Sections */
        .layer-content {
            display: none;
            flex: 1;
            animation: fadeIn 0.4s ease-in-out;
        }

        .layer-content.active {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(4px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .layer-header {
            display: inline-block;
            background: var(--phosphor);
            color: #000;
            padding: 3px 12px;
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
            transition: border-color 0.2s;
        }

        .data-card:hover {
            border-color: var(--phosphor);
            box-shadow: 0 0 10px var(--phosphor-glow);
        }

        .card-label {
            color: var(--accent);
            font-family: var(--font-mono);
            font-size: 0.95rem;
            text-transform: uppercase;
            margin-bottom: 4px;
            letter-spacing: 1px;
        }

        .card-val {
            font-size: 1.15rem;
            line-height: 1.3;
            word-break: break-word;
        }

        /* Interactive Dial-Up Lab Components */
        .lab-box {
            background: rgba(0, 0, 0, 0.7);
            border: 1px solid var(--phosphor);
            padding: 15px;
            margin-bottom: 20px;
        }

        .lab-title {
            font-family: var(--font-mono);
            font-size: 1.1rem;
            color: var(--accent);
            margin-bottom: 10px;
            border-bottom: 1px solid var(--phosphor-dim);
            padding-bottom: 5px;
        }

        /* Multilink PPP Visualizer */
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
            height: 24px;
            background: #000;
            border: 1px solid var(--phosphor-dim);
            position: relative;
            overflow: hidden;
        }

        .packet-dot {
            position: absolute;
            top: 3px;
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
            font-size: 1rem;
            color: var(--accent);
            text-align: right;
        }

        /* Sound Synth & Modem Audio Button */
        .sound-lab-bar {
            display: flex;
            gap: 10px;
            margin-top: 10px;
            align-items: center;
            flex-wrap: wrap;
        }

        .action-btn {
            background: transparent;
            border: 1px solid var(--phosphor);
            color: var(--phosphor);
            padding: 6px 14px;
            font-family: var(--font-mono);
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.2s;
        }

        .action-btn:hover {
            background: var(--phosphor);
            color: #000;
            box-shadow: 0 0 10px var(--phosphor);
        }

        /* Interactive Terminal CLI */
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

        /* Footer & Cursor */
        .footer-note {
            margin-top: auto;
            padding-top: 15px;
            border-top: 1px dashed var(--phosphor-dim);
            font-size: 1rem;
            opacity: 0.85;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .blinking-cursor {
            display: inline-block;
            width: 9px;
            height: 1.1rem;
            background: var(--phosphor);
            animation: blink 0.8s step-end infinite;
            vertical-align: bottom;
        }

        @keyframes blink {
            50% { opacity: 0; }
        }
    </style>
</head>
<body class="theme-green">

    <!-- Matrix Background Rain -->
    <canvas id="matrixRain"></canvas>
    
    <!-- CRT Overlay & Vignette -->
    <div class="crt-overlay"></div>
    <div class="crt-vignette"></div>

    <div class="viewport">
        
        <!-- Header & System Telemetry LEDs -->
        <div class="system-bar">
            <div class="brand-title">
                <h1>NAVI // COPELAND OS 4.92</h1>
                <div class="brand-subtitle">SYSTEM IDENTIFIER: lainphp-summary_v4.92prerelease-prejudice</div>
            </div>

            <div class="led-panel">
                <div class="led-item">
                    <div class="led-light active blink" id="ledCarrier"></div>
                    <span>CARRIER</span>
                </div>
                <div class="led-item">
                    <div class="led-light active blink" id="ledData"></div>
                    <span>DATA</span>
                </div>
                <div class="led-item">
                    <div class="led-light active" id="ledMppp"></div>
                    <span>MPPP BONDED</span>
                </div>
                <div class="led-item">
                    <span style="color:var(--accent);">56.0k V.92</span>
                </div>
            </div>
        </div>

        <!-- CRT Control Adjustments Panel -->
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
                <button class="toggle-btn" id="audioToggle" onclick="toggleAudio()">AUDIO SFX: MUTED</button>
            </div>
        </div>

        <!-- Navigation Tabs ("Layer" Format) -->
        <div class="layer-tabs">
            <button class="tab-btn active" onclick="switchLayer('layer-1', this)">Layer 01 // IDENTITY</button>
            <button class="tab-btn" onclick="switchLayer('layer-2', this)">Layer 02 // SYSTEM</button>
            <button class="tab-btn" onclick="switchLayer('layer-3', this)">Layer 03 // DIALUP_LAB</button>
            <button class="tab-btn" onclick="switchLayer('layer-4', this)">Layer 04 // HARDWARE</button>
            <button class="tab-btn" onclick="switchLayer('layer-5', this)">Layer 05 // MEDIA</button>
            <button class="tab-btn" onclick="switchLayer('layer-6', this)">Layer 06 // NODES</button>
            <button class="tab-btn" onclick="switchLayer('layer-7', this)">Layer 07 // DSL_UNIX</button>
        </div>

        <!-- LAYER 01 -->
        <div class="layer-content active" id="layer-1">
            <div class="layer-header">[LAYER 01 // IDENTITY_CORE]</div>
            <div class="data-grid">
                <?php foreach ($user_database["Layer 01 // IDENTITY_CORE"] as $key => $val): ?>
                    <div class="data-card">
                        <div class="card-label"><?= htmlspecialchars($key) ?></div>
                        <div class="card-val"><?= htmlspecialchars($val) ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- LAYER 02 -->
        <div class="layer-content" id="layer-2">
            <div class="layer-header">[LAYER 02 // SYSTEM_ENVIRONMENT]</div>
            <div class="data-grid">
                <?php foreach ($user_database["Layer 02 // SYSTEM_ENVIRONMENT"] as $key => $val): ?>
                    <div class="data-card">
                        <div class="card-label"><?= htmlspecialchars($key) ?></div>
                        <div class="card-val"><?= htmlspecialchars($val) ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- LAYER 03 // DIALUP & RETRO NETWORKING LAB -->
        <div class="layer-content" id="layer-3">
            <div class="layer-header">[LAYER 03 // RETRO_NETWORKING & DIALUP_LAB]</div>
            
            <div class="data-grid">
                <?php foreach ($user_database["Layer 03 // RETRO_NETWORKING & DIALUP_LAB"] as $key => $val): ?>
                    <div class="data-card">
                        <div class="card-label"><?= htmlspecialchars($key) ?></div>
                        <div class="card-val"><?= htmlspecialchars($val) ?></div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Multilink PPP Visualizer Widget -->
            <div class="lab-box">
                <div class="lab-title">> MULTILINK PPP (MP / RFC 1990) DUAL-LINK BONDING ENGINE</div>
                <p style="font-size:1rem; opacity:0.9;">Multilink PPP distributes data packet fragments across multiple physical serial/modem connections simultaneously, combining bandwidth into a single logical pipe with sequence numbers and reassembly controls.</p>
                
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
                    BONDED THROUGHPUT: <span style="color:var(--phosphor); font-weight:bold;">112.0 Kbps</span> | REASSEMBLY BUFFER: SYNCED (0 DROP)
                </div>
            </div>

            <!-- Web Audio Modem Handshake Synthesizer -->
            <div class="lab-box">
                <div class="lab-title">> SYNTHESIZED V.90 / V.92 MODEM HANDSHAKE AUDIO GENERATOR</div>
                <p style="font-size:1rem; opacity:0.9;">Synthesizes real-time DTMF touch-tones, V.8 bis carrier negotiation, and V.34/V.90 constellation training white noise using pure Web Audio API oscillators.</p>
                
                <div class="sound-lab-bar">
                    <button class="action-btn" onclick="playModemSound('v90')">▶ INITIATE V.90 MODEM HANDSHAKE (56k)</button>
                    <button class="action-btn" onclick="playModemSound('dtmf')">▶ DIAL DTMF TOUCH-TONES</button>
                    <button class="action-btn" onclick="playModemSound('zmodem')">▶ SIMULATE ZMODEM BURST</button>
                    <span id="modemAudioStatus" style="font-family:var(--font-mono); font-size:0.9rem;">[STATUS: IDLE]</span>
                </div>
            </div>
        </div>

        <!-- LAYER 04 -->
        <div class="layer-content" id="layer-4">
            <div class="layer-header">[LAYER 04 // HARDWARE_LINK]</div>
            <div class="data-grid">
                <?php foreach ($user_database["Layer 04 // HARDWARE_LINK"] as $key => $val): ?>
                    <div class="data-card">
                        <div class="card-label"><?= htmlspecialchars($key) ?></div>
                        <div class="card-val"><?= htmlspecialchars($val) ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- LAYER 05 -->
        <div class="layer-content" id="layer-5">
            <div class="layer-header">[LAYER 05 // MEDIA_STREAM]</div>
            <div class="data-grid">
                <?php foreach ($user_database["Layer 05 // MEDIA_STREAM"] as $key => $val): ?>
                    <div class="data-card">
                        <div class="card-label"><?= htmlspecialchars($key) ?></div>
                        <div class="card-val"><?= htmlspecialchars($val) ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- LAYER 06 -->
        <div class="layer-content" id="layer-6">
            <div class="layer-header">[LAYER 06 // EXTERNAL_NODES]</div>
            <div class="data-grid">
                <?php foreach ($user_database["Layer 06 // EXTERNAL_NODES"] as $key => $val): ?>
                    <div class="data-card">
                        <div class="card-label"><?= htmlspecialchars($key) ?></div>
                        <div class="card-val"><?= htmlspecialchars($val) ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- LAYER 07 // INTERACTIVE INTERNET/CLI SHELL -->
        <div class="layer-content" id="layer-7">
            <div class="layer-header">[LAYER 07 // DSL_UNIX COMMAND INTERFACE]</div>
            
            <div class="terminal-window">
                <div class="terminal-output" id="termOutput">Navi / Copeland OS v4.92 (lainphp-summary_v4.92prerelease-prejudice)
Type 'help' for available commands.
Connected to Wired Gateway (127.0.0.1:8000 via Multilink PPP).
</div>
                <div class="cmd-line">
                    <span class="prompt">lain@dsl-unix:~$</span>
                    <input type="text" class="cmd-input" id="cmdInput" autofocus placeholder="Type command here..." onkeydown="handleCmd(event)">
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer-note">
            <span>> WIRED GATEWAY // SYSTEM STABLE <span class="blinking-cursor"></span></span>
            <span>Navi OS 4.92 | Multilink PPP Active</span>
        </div>

    </div>

    <!-- JavaScript logic -->
    <script>
        /* --- 1. MATRIX DIGITAL RAIN CANVAS --- */
        const canvas = document.getElementById('matrixRain');
        const ctx = canvas.getContext('2d');

        function resizeCanvas() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        }
        resizeCanvas();
        window.addEventListener('resize', resizeCanvas);

        const katakana = 'ｱｲｳｴｵｶｷｸｹｺｻｼｽｾｿﾀﾁﾂﾃﾄﾅﾆﾇﾈﾉﾊﾋﾌﾍﾎﾏﾐﾑﾒﾓﾔﾕﾖﾗﾘﾙﾚﾛﾜﾝABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        const fontSize = 16;
        let columns = Math.floor(canvas.width / fontSize);
        let drops = Array(columns).fill(1);

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

        /* --- 2. LAYER TAB SWITCHING --- */
        function switchLayer(layerId, btnElem) {
            playKeySound();
            document.querySelectorAll('.layer-content').forEach(el => el.classList.remove('active'));
            document.querySelectorAll('.tab-btn').forEach(el => el.classList.remove('active'));
            
            document.getElementById(layerId).classList.add('active');
            if(btnElem) btnElem.classList.add('active');
        }

        /* --- 3. CRT THEME & SCANLINE CONTROLS --- */
        function setTheme(themeName, btnElem) {
            playKeySound();
            document.body.className = '';
            document.body.classList.add('theme-' + themeName);
            
            document.querySelectorAll('.theme-btn').forEach(el => el.classList.remove('active'));
            if(btnElem) btnElem.classList.add('active');
        }

        let scanlinesOn = true;
        function toggleScanlines() {
            playKeySound();
            scanlinesOn = !scanlinesOn;
            document.documentElement.style.setProperty('--scanline-opacity', scanlinesOn ? '0.25' : '0');
            const btn = document.getElementById('scanlineToggle');
            btn.classList.toggle('active', scanlinesOn);
            btn.innerText = scanlinesOn ? 'SCANLINES: ON' : 'SCANLINES: OFF';
        }

        let audioEnabled = false;
        function toggleAudio() {
            audioEnabled = !audioEnabled;
            const btn = document.getElementById('audioToggle');
            btn.classList.toggle('active', audioEnabled);
            btn.innerText = audioEnabled ? 'AUDIO SFX: ENABLED' : 'AUDIO SFX: MUTED';
            if (audioEnabled) {
                initAudioContext();
                playKeySound();
            }
        }

        /* --- 4. WEB AUDIO SYNTHESIZER (MODEM HANDSHAKE & CLICK SFX) --- */
        let audioCtx = null;
        function initAudioContext() {
            if (!audioCtx) {
                audioCtx = new (window.AudioContext || window.webkitAudioContext)();
            }
            if (audioCtx.state === 'suspended') {
                audioCtx.resume();
            }
        }

        function playKeySound() {
            if (!audioEnabled) return;
            initAudioContext();
            try {
                const osc = audioCtx.createOscillator();
                const gain = audioCtx.createGain();
                osc.type = 'triangle';
                osc.frequency.setValueAtTime(800 + Math.random() * 200, audioCtx.currentTime);
                gain.gain.setValueAtTime(0.03, audioCtx.currentTime);
                gain.gain.exponentialRampToValueAtTime(0.001, audioCtx.currentTime + 0.04);
                osc.connect(gain);
                gain.connect(audioCtx.destination);
                osc.start();
                osc.stop(audioCtx.currentTime + 0.04);
            } catch(e) {}
        }

        function playModemSound(type) {
            initAudioContext();
            const statusElem = document.getElementById('modemAudioStatus');
            statusElem.innerText = '[STATUS: GENERATING SYNTH AUDIO...]';

            const now = audioCtx.currentTime;

            if (type === 'dtmf') {
                // Dial tone + 4 DTMF tones
                const freqs = [[941, 1336], [697, 1209], [770, 1336], [852, 1477]];
                freqs.forEach((pair, idx) => {
                    const startTime = now + idx * 0.12;
                    pair.forEach(f => {
                        const osc = audioCtx.createOscillator();
                        const gain = audioCtx.createGain();
                        osc.frequency.value = f;
                        gain.gain.setValueAtTime(0.06, startTime);
                        gain.gain.exponentialRampToValueAtTime(0.001, startTime + 0.08);
                        osc.connect(gain);
                        gain.connect(audioCtx.destination);
                        osc.start(startTime);
                        osc.stop(startTime + 0.08);
                    });
                });
                setTimeout(() => statusElem.innerText = '[STATUS: DTMF DIAL COMPLETE]', 600);
            } 
            else if (type === 'v90' || type === 'zmodem') {
                // Synthesize classic Modem Handshake sequence
                // 1. Dial Tone
                const osc1 = audioCtx.createOscillator();
                const gain1 = audioCtx.createGain();
                osc1.frequency.setValueAtTime(350, now);
                gain1.gain.setValueAtTime(0.05, now);
                gain1.gain.exponentialRampToValueAtTime(0.001, now + 0.4);
                osc1.connect(gain1);
                gain1.connect(audioCtx.destination);
                osc1.start(now);
                osc1.stop(now + 0.4);

                // 2. High Carrier Whistle (2100 Hz V.8 bis Answer Tone)
                const osc2 = audioCtx.createOscillator();
                const gain2 = audioCtx.createGain();
                osc2.frequency.setValueAtTime(2100, now + 0.45);
                gain2.gain.setValueAtTime(0.08, now + 0.45);
                gain2.gain.exponentialRampToValueAtTime(0.001, now + 1.2);
                osc2.connect(gain2);
                gain2.connect(audioCtx.destination);
                osc2.start(now + 0.45);
                osc2.stop(now + 1.2);

                // 3. Trellis & Constellation Noise Burst (Filtered Noise)
                const bufferSize = audioCtx.sampleRate * 1.5;
                const buffer = audioCtx.createBuffer(1, bufferSize, audioCtx.sampleRate);
                const data = buffer.getChannelData(0);
                for (let i = 0; i < bufferSize; i++) {
                    data[i] = Math.random() * 2 - 1;
                }
                const noise = audioCtx.createBufferSource();
                noise.buffer = buffer;

                const filter = audioCtx.createBiquadFilter();
                filter.type = 'bandpass';
                filter.frequency.setValueAtTime(1800, now + 1.2);
                filter.Q.setValueAtTime(3, now + 1.2);

                const noiseGain = audioCtx.createGain();
                noiseGain.gain.setValueAtTime(0.07, now + 1.2);
                noiseGain.gain.exponentialRampToValueAtTime(0.001, now + 2.5);

                noise.connect(filter);
                filter.connect(noiseGain);
                noiseGain.connect(audioCtx.destination);
                noise.start(now + 1.2);
                noise.stop(now + 2.5);

                setTimeout(() => statusElem.innerText = type === 'v90' ? '[STATUS: V.90 56K CARRIER LOCKED]' : '[STATUS: ZMODEM CRC-32 BLOCK VERIFIED]', 2600);
            }
        }

        /* --- 5. INTERACTIVE TERMINAL CLI (`lain@dsl-unix:~$`) --- */
        function handleCmd(event) {
            if (event.key === 'Enter') {
                playKeySound();
                const inputElem = document.getElementById('cmdInput');
                const outputElem = document.getElementById('termOutput');
                const rawCmd = inputElem.value.trim();
                inputElem.value = '';

                if (!rawCmd) return;

                outputElem.innerText += '\nlain@dsl-unix:~$ ' + rawCmd + '\n';
                const parts = rawCmd.split(' ');
                const cmd = parts[0].toLowerCase();
                const arg = parts[1] ? parts[1].toLowerCase() : '';

                switch (cmd) {
                    case 'help':
                        outputElem.innerText += `Available Commands:
  help                     - Show command manual
  layer <1-7>             - Switch active UI Layer (e.g. layer 3)
  dial <v90|v92|v34>       - Trigger V. Series modem handshake
  mppp status              - View Multilink PPP channel status
  theme <green|amber|cyan|white> - Change CRT Phosphor color theme
  sound <on|off>          - Toggle audio SFX
  zmodem download          - Simulate ZMODEM protocol file transfer
  cat identity             - Output Layer 01 Identity summary
  clear                    - Clear terminal screen\n`;
                        break;

                    case 'layer':
                        if (arg >= 1 && arg <= 7) {
                            const btn = document.querySelectorAll('.tab-btn')[arg - 1];
                            switchLayer('layer-' + arg, btn);
                            outputElem.innerText += `[SUCCESS] Switched to Layer 0${arg}.\n`;
                        } else {
                            outputElem.innerText += `Usage: layer <1-7>\n`;
                        }
                        break;

                    case 'dial':
                        playModemSound('v90');
                        outputElem.innerText += `[DIAL] Negotiating V.Series PCM carrier handshake... Carrier lock at 56,000 bps.\n`;
                        break;

                    case 'mppp':
                        outputElem.innerText += `[MPPP STATUS] Multilink PPP (RFC 1990) Bundle:
  Link A: 56.0 Kbps (V.90 Serial 1) - Fragment TX: OK
  Link B: 56.0 Kbps (V.90 Serial 2) - Fragment RX: OK
  Aggregated Throughput: 112.0 Kbps | Packet Loss: 0.00%\n`;
                        break;

                    case 'theme':
                        if (['green', 'amber', 'cyan', 'white'].includes(arg)) {
                            const btns = document.querySelectorAll('.theme-btn');
                            const targetBtn = Array.from(btns).find(b => b.innerText.toLowerCase() === arg);
                            setTheme(arg, targetBtn);
                            outputElem.innerText += `[THEME] Switched phosphor palette to ${arg.toUpperCase()}.\n`;
                        } else {
                            outputElem.innerText += `Usage: theme <green|amber|cyan|white>\n`;
                        }
                        break;

                    case 'sound':
                        if (arg === 'on') {
                            if (!audioEnabled) toggleAudio();
                            outputElem.innerText += `[AUDIO] Audio SFX Enabled.\n`;
                        } else if (arg === 'off') {
                            if (audioEnabled) toggleAudio();
                            outputElem.innerText += `[AUDIO] Audio SFX Muted.\n`;
                        } else {
                            outputElem.innerText += `Usage: sound <on|off>\n`;
                        }
                        break;

                    case 'zmodem':
                        playModemSound('zmodem');
                        outputElem.innerText += `[ZMODEM] Sending ZFILE packet...
  Filename: copeland_os_v4.92.bin [1024 KB]
  [=========================>] 100% | CRC-32: 0x8F92A1C4 | Transfer Complete.\n`;
                        break;

                    case 'cat':
                        outputElem.innerText += `[IDENTITY SUMMARY]
  Status: Connected to The Wired
  Clearance: Level 6 Computing / Cybersecurity / Dial-Up Specialist
  Designation: First-line IT Support
  Philosophy: No matter where you go, everyone is connected.\n`;
                        break;

                    case 'clear':
                        outputElem.innerText = `Navi / Copeland OS v4.92 (lainphp-summary_v4.92prerelease-prejudice)\n`;
                        break;

                    default:
                        outputElem.innerText += `Command not recognized: '${cmd}'. Type 'help' for manual.\n`;
                        break;
                }

                outputElem.scrollTop = outputElem.scrollHeight;
            }
        }
    </script>
</body>
</html>