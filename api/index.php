<?php
// --- DADOS DO SISTEMA (PHP - Estrutura V4 Otimizada) ---
$questions = [
    [
        'id' => 'gatekeeper',
        'question' => "Protocolo de Hardware:",
        'subtext' => "O sistema Neural exige poder de processamento desktop para a interface cérebro-máquina.",
        'options' => [
            ['label' => "Confirmar Desktop (PC/Mac)", 'value' => true, 'icon' => 'cpu'],
            ['label' => "Apenas Dispositivo Móvel", 'value' => false, 'icon' => 'smartphone-nfc']
        ]
    ],
    [
        'id' => 'objective',
        'question' => "Seu Vetor de Ataque Principal:",
        'subtext' => "Onde você aplicará a singularidade da IA?",
        'options' => [
            ['label' => "Hiper-Escala de Conteúdo", 'icon' => 'zap-fast'],
            ['label' => "Dominação de Mercado (Vendas)", 'icon' => 'trending-up'],
            ['label' => "Criação Generativa (Design)", 'icon' => 'palette'],
            ['label' => "Automação Autônoma", 'icon' => 'workflow']
        ]
    ],
    [
        'id' => 'investment',
        'question' => "Valor Percebido vs. Tempo:",
        'subtext' => "Qual o custo de oportunidade de não usar IA hoje?",
        'options' => [
            ['label' => "Micro-investimento diário", 'icon' => 'coins'],
            ['label' => "Investimento estratégico mensal", 'icon' => 'credit-card'],
            ['label' => "Foco total no ROI (Retorno)", 'icon' => 'diamond'] 
        ]
    ],
    [
        'id' => 'level',
        'question' => "Nível de Integração Atual:",
        'subtext' => "Calibrando a complexidade do sistema para você.",
        'options' => [
            ['label' => "Iniciado (Nível 1)", 'emoji' => "🧬"],
            ['label' => "Operador (Nível 5)", 'emoji' => "🦾"],
            ['label' => "Arquiteto (Nível 10)", 'emoji' => "🧠"]
        ]
    ]
];

$plans = [
    [
        'id' => 1,
        'name' => "ACESSO CORE",
        'oldPrice' => "R$ 97/mês",
        'price' => "R$ 55",
        'period' => "/mês",
        'features' => ["Motor de 50+ IAs", "Integração Canva Pro", "Suporte Básico"],
        'highlight' => false,
        'installment' => null
    ],
    [
        'id' => 2,
        'name' => "NUCLEO NEURAL BLACK",
        'oldPrice' => "R$ 197/trimestre",
        'price' => "R$ 120",
        'period' => "/trimestre",
        'installment' => "3x de R$ 40,00 sem juros",
        'features' => ["Motor de 50+ IAs (Prioridade)", "Canva Pro + Assets Premium", "Networking Neural VIP", "Suporte Dedicado 24/7", "Bônus: Protocolo Vendas"],
        'highlight' => true // O ESCOLHIDO
    ],
    [
        'id' => 3,
        'name' => "SISTEMA VITALÍCIO",
        'oldPrice' => "R$ 497/semestre",
        'price' => "R$ 210",
        'period' => "/semestre",
        'installment' => "ou 6x R$ 35",
        'features' => ["Motor de 50+ IAs", "Canva Pro Incluso", "Mentoria Gravada do Fundador", "Setup Imediato"],
        'highlight' => false,
        'installment' => "6x de R$ 35,00"
    ]
];
?>

<!DOCTYPE html>
<html lang="pt-BR" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NUCLEO IA - Protocolo 2050</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    
    <script src="https://unpkg.com/lucide@latest"></script>

    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.8.0/vanilla-tilt.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@300;400;600;700&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --neon-cyan: #00f7ff;
            --neon-purple: #bd00ff;
            --dark-bg: #05050a;
        }
        
        body { 
            font-family: 'Chakra Petch', sans-serif; 
            background-color: var(--dark-bg);
            color: #e2e8f0;
        }
        
        .font-mono { font-family: 'JetBrains Mono', monospace; }

        /* --- BACKGROUND NEURAL 2050 --- */
        .bg-cyberpunk {
            background-color: var(--dark-bg);
            background-image: 
                radial-gradient(circle at 50% 0%, rgba(0, 247, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 100% 100%, rgba(189, 0, 255, 0.1) 0%, transparent 40%),
                linear-gradient(rgba(0, 247, 255, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 247, 255, 0.03) 1px, transparent 1px);
            background-size: 100% 100%, 100% 100%, 40px 40px, 40px 40px;
            background-position: center, center, center, center;
        }
        .bg-scanlines {
            background: repeating-linear-gradient(0deg, rgba(0,0,0,0.1) 0px, rgba(0,0,0,0.1) 1px, transparent 1px, transparent 2px);
            pointer-events: none;
        }

        /* --- EFEITOS HOLOGRÁFICOS --- */
        .holo-card {
            background: rgba(10, 10, 20, 0.6);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(0, 247, 255, 0.2);
            box-shadow: 0 0 30px rgba(0, 247, 255, 0.05), inset 0 0 20px rgba(0, 247, 255, 0.05);
            position: relative;
            overflow: hidden;
        }
        .holo-card::before { /* Scanline interna */
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; height: 100%;
            background: linear-gradient(to bottom, transparent, rgba(0, 247, 255, 0.1), transparent);
            transform: translateY(-100%);
            animation: scanline 3s linear infinite;
        }
        .holo-card:hover {
            border-color: rgba(0, 247, 255, 0.6);
            box-shadow: 0 0 50px rgba(0, 247, 255, 0.2), inset 0 0 30px rgba(0, 247, 255, 0.1);
        }

        /* Efeito de Aberração Cromática (RGB Split) no Texto */
        .glitch-text {
            text-shadow: 2px 0 rgba(189, 0, 255, 0.7), -2px 0 rgba(0, 247, 255, 0.7);
        }

        /* --- ANIMAÇÕES --- */
        @keyframes scanline { 0% { transform: translateY(-100%); } 100% { transform: translateY(100%); } }
        @keyframes pulse-plasma { 0%, 100% { box-shadow: 0 0 20px var(--neon-cyan), inset 0 0 20px var(--neon-cyan); } 50% { box-shadow: 0 0 60px var(--neon-purple), inset 0 0 40px var(--neon-purple); } }
        @keyframes shockwave { 0% { transform: scale(1); opacity: 1; } 100% { transform: scale(1.5); opacity: 0; } }
        
        .animate-plasma { animation: pulse-plasma 2s infinite alternate; }

        /* Botão de Conversão Máxima */
        .btn-conversion {
            background: linear-gradient(45deg, var(--neon-cyan), var(--neon-purple));
            position: relative; color: black; font-weight: 800; text-transform: uppercase; letter-spacing: 2px;
            border: none; overflow: hidden; z-index: 1; clip-path: polygon(10% 0, 100% 0, 90% 100%, 0 100%);
        }
        .btn-conversion::after { /* Shockwave effect */
            content: ''; position: absolute; inset: 0; background: inherit; z-index: -1;
            animation: shockwave 1.5s infinite;
        }

        /* Scrollbar Cyberpunk */
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: #0a0a0a; }
        ::-webkit-scrollbar-thumb { background: var(--neon-cyan); }

        [x-cloak] { display: none !important; }
    </style>
</head>

<body class="bg-cyberpunk min-h-screen overflow-x-hidden selection:bg-cyan-500/30 selection:text-cyan-100"
      x-data="appData()" x-init="initApp()">

    <div class="fixed inset-0 z-50 bg-scanlines opacity-30 pointer-events-none"></div>

    <header class="fixed top-0 left-0 right-0 z-40 p-4 flex justify-between items-center backdrop-blur-md border-b border-cyan-900/30">
        <div class="flex items-center gap-3 animate-pulse">
            <i data-lucide="cpu" class="w-5 h-5 text-cyan-400"></i>
            <span class="font-bold tracking-[0.2em] text-sm text-cyan-100">NUCLEO.NEURAL_V5</span>
        </div>
        <div class="hidden md:flex items-center gap-4 font-mono text-xs text-cyan-500/70">
            <span>STATUS: <span class="text-green-400 animate-pulse">ATIVO</span></span>
            <span>LATÊNCIA: 2ms</span>
            <span>USUÁRIOS CONECTADOS: 14.502</span>
        </div>
    </header>

    <main class="relative z-10 pt-20 min-h-screen flex flex-col">
        
        <div x-show="step === 'hero'" 
             x-transition:enter="transition ease-out duration-1000"
             x-transition:enter-start="opacity-0 scale-90 blur-sm"
             x-transition:enter-end="opacity-100 scale-100 blur-0"
             class="flex-1 flex flex-col items-center justify-center px-6 text-center">
            
            <div class="mb-8 inline-flex items-center gap-2 px-4 py-2 bg-red-950/30 border border-red-500/50 rounded-sm text-red-400 font-mono text-xs">
                <i data-lucide="alert-octagon" class="w-4 h-4 animate-ping"></i>
                <span>AVISO: A Singularidade da IA já começou. Você está atrasado.</span>
            </div>

            <h1 class="text-6xl md:text-9xl font-black text-white mb-4 tracking-tighter leading-none glitch-text relative z-10">
                DOMINAÇÃO<br/>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-white to-purple-400 animate-plasma">
                    TOTAL
                </span>
            </h1>

            <p class="text-xl text-cyan-300/80 max-w-2xl mb-12 font-light leading-relaxed relative z-10">
                Não é mais sobre "usar" IA. É sobre <strong class="text-white">integrar</strong>. 
                O sistema Nucleo funde as 50 IAs mais poderosas do mundo diretamente no seu fluxo de trabalho.
            </p>

            <div data-tilt data-tilt-scale="1.05" class="relative z-20">
                <button @click="startQuiz()" 
                        class="btn-conversion px-12 py-6 text-xl group">
                    <span class="relative flex items-center gap-4 z-10">
                        INICIAR PROTOCOLO DE FUSÃO <i data-lucide="chevron-right" class="w-6 h-6 group-hover:translate-x-2 transition-transform"></i>
                    </span>
                </button>
                <div class="absolute inset-0 bg-gradient-to-r from-cyan-500 to-purple-600 blur-3xl opacity-50 -z-10 animate-pulse"></div>
            </div>
        </div>

        <div x-show="step === 'quiz'" x-cloak
             class="flex-1 flex flex-col items-center justify-center px-4 w-full max-w-3xl mx-auto py-10">
            
            <div class="w-full mb-16 font-mono">
                <div class="flex justify-between text-cyan-500 text-xs mb-2">
                    <span>UPLOAD DE DADOS: <span x-text="Math.round(((currentQuizIndex + 1) / totalQuestions) * 100) + '%'"></span></span>
                    <span>SETORES: <span x-text="currentQuizIndex + 1"></span>/<span x-text="totalQuestions"></span></span>
                </div>
                <div class="h-2 w-full bg-black/50 border border-cyan-900/50 relative overflow-hidden">
                    <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20 mix-blend-overlay"></div>
                    <div class="h-full bg-gradient-to-r from-cyan-500 to-purple-600 shadow-[0_0_20px_cyan] transition-all duration-500 relative"
                         :style="'width: ' + (((currentQuizIndex + 1) / totalQuestions) * 100) + '%'">
                        <div class="absolute right-0 top-0 h-full w-1 bg-white animate-pulse"></div>
                    </div>
                </div>
            </div>

            <?php foreach ($questions as $index => $q): ?>
                <div x-show="currentQuizIndex === <?= $index ?>" 
                     x-transition:enter="transition ease-out duration-500"
                     x-transition:enter-start="opacity-0 translate-x-40 scale-95"
                     x-transition:enter-end="opacity-100 translate-x-0 scale-100"
                     class="w-full">
                    
                    <h2 class="text-3xl md:text-5xl font-bold text-white mb-4 glitch-text leading-tight"><?= $q['question'] ?></h2>
                    <p class="text-cyan-400/70 text-lg mb-12 font-light border-l-4 border-cyan-500/50 pl-6"><?= $q['subtext'] ?></p>

                    <div class="grid gap-4">
                        <?php foreach ($q['options'] as $opt): ?>
                            <div data-tilt data-tilt-max="5" data-tilt-glare data-tilt-max-glare="0.1" class="w-full">
                                <button @click="handleAnswer('<?= $q['id'] ?>', '<?= isset($opt['value']) ? $opt['value'] : $opt['label'] ?>')"
                                        class="holo-card w-full text-left p-6 rounded-sm flex items-center gap-6 group transition-all relative">
                                    
                                    <div class="w-16 h-16 rounded-sm bg-black/50 flex items-center justify-center border border-cyan-500/30 group-hover:border-cyan-400 group-hover:bg-cyan-500/10 transition-colors relative overflow-hidden">
                                        <div class="absolute inset-0 bg-cyan-400/20 blur-xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                        <?php if(isset($opt['icon'])): ?>
                                            <i data-lucide="<?= $opt['icon'] ?>" class="w-8 h-8 text-cyan-500/50 group-hover:text-cyan-100 relative z-10 transition-colors"></i>
                                        <?php elseif(isset($opt['emoji'])): ?>
                                            <span class="text-3xl relative z-10"><?= $opt['emoji'] ?></span>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <div class="flex-1">
                                        <span class="text-xl font-bold text-white group-hover:text-cyan-300 transition-colors block"><?= $opt['label'] ?></span>
                                    </div>

                                    <i data-lucide="chevron-right" class="w-6 h-6 text-cyan-500 opacity-0 group-hover:opacity-100 group-hover:translate-x-2 transition-all"></i>
                                </button>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div x-show="step === 'block'" x-cloak
             class="flex-1 flex flex-col items-center justify-center px-6 text-center bg-red-950/20">
            <div class="holo-card p-12 max-w-md border-red-500/50 shadow-[0_0_50px_rgba(239,68,68,0.2)]">
                <i data-lucide="skull" class="w-20 h-20 text-red-500 mx-auto mb-8 animate-pulse"></i>
                <h2 class="text-3xl font-bold text-white mb-4 glitch-text">FALHA CRÍTICA DE HARDWARE</h2>
                <p class="text-red-300 mb-10 font-mono text-sm leading-relaxed">
                    ERR_MOBILE_DETECTED: O poder computacional necessário excede a capacidade do seu dispositivo móvel. Acesse via terminal desktop.
                </p>
                <button @click="resetToHero()" 
                        class="w-full py-4 bg-red-500/10 hover:bg-red-500/30 border border-red-500/50 text-red-100 font-bold uppercase tracking-widest transition-colors">
                    Reiniciar Sistema
                </button>
            </div>
        </div>

        <div x-show="step === 'processing'" x-cloak
             class="flex-1 flex flex-col items-center justify-center px-6 bg-black relative overflow-hidden">
            
            <div class="relative w-64 h-64 mb-12 flex items-center justify-center">
                <div class="absolute inset-0 bg-cyan-500/10 rounded-full blur-3xl animate-pulse"></div>
                <div class="absolute w-full h-full border-2 border-cyan-500/20 rounded-full animate-spin [animation-duration:10s]"></div>
                <div class="absolute w-3/4 h-3/4 border-2 border-purple-500/30 rounded-full animate-spin [animation-duration:5s] border-dashed"></div>
                
                <i data-lucide="brain-circuit" class="w-32 h-32 text-white relative z-10 animate-pulse-plasma drop-shadow-[0_0_20px_cyan]"></i>
            </div>

            <div class="w-full max-w-md space-y-2 font-mono text-center relative z-10">
                <h2 class="text-2xl font-bold text-white mb-2 glitch-text" x-text="processStatus"></h2>
                <div class="flex justify-between text-cyan-500 text-xs">
                    <span>INTEGRIDADE DOS DADOS</span>
                    <span x-text="processPercent + '%'"></span>
                </div>
                <div class="h-1 w-full bg-gray-900 relative overflow-hidden">
                    <div class="h-full bg-gradient-to-r from-cyan-500 via-white to-purple-500 shadow-[0_0_30px_cyan]" :style="'width: ' + processPercent + '%'"></div>
                </div>
            </div>
            
            <div class="absolute inset-0 bg-[url('https://media.giphy.com/media/26tn33ai009Q1c7HW/giphy.gif')] opacity-5 mix-blend-screen pointer-events-none bg-cover"></div>
        </div>

        <div x-show="step === 'sales'" x-cloak
             class="flex-1 py-20 px-4 overflow-y-auto w-full relative z-10 bg-black/80 backdrop-blur-xl">
             
             <div class="max-w-6xl mx-auto">
                <div class="text-center mb-16" data-aos="zoom-in">
                    <div class="inline-flex items-center gap-3 px-6 py-2 border border-green-400/30 bg-green-950/30 text-green-400 font-bold mb-8 uppercase tracking-[0.3em] shadow-[0_0_30px_rgba(34,197,94,0.2)]">
                        <i data-lucide="shield-check" class="w-5 h-5 animate-pulse"></i>
                        Acesso Neural Concedido
                    </div>
                    <h1 class="text-5xl md:text-7xl font-black text-white mb-6 leading-none glitch-text">
                        SELECIONE SEU <br/>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-purple-500 animate-plasma">
                            PROTOCOLO DE PODER
                        </span>
                    </h1>
                </div>

                <div class="flex justify-center mb-20">
                    <div class="holo-card flex items-center gap-6 px-8 py-4 border-red-500/50 bg-red-950/20 shadow-[0_0_40px_rgba(239,68,68,0.3)] animate-pulse">
                        <div class="text-red-500 relative">
                            <i data-lucide="alert-triangle" class="w-10 h-10 absolute inset-0 animate-ping opacity-50"></i>
                            <i data-lucide="timer-reset" class="w-10 h-10 relative z-10"></i>
                        </div>
                        <div class="text-left">
                            <div class="text-4xl font-black text-white font-mono tracking-widest glitch-text" x-text="formatTime(timeLeft)"></div>
                            <div class="text-red-300 text-xs uppercase tracking-wider font-bold">Janela de Oportunidade Crítica</div>
                        </div>
                    </div>
                </div>

                <div class="grid md:grid-cols-3 gap-8 items-center pb-20">
                    <?php foreach ($plans as $plan): ?>
                        <div class="relative transition-all duration-500 transform <?= $plan['highlight'] ? 'md:scale-110 z-20 md:-mt-4 mb-10 md:mb-0' : 'scale-100 z-10 hover:scale-105 opacity-80 hover:opacity-100' ?>">
                            
                            <?php if ($plan['highlight']): ?>
                                <div class="absolute -inset-1 bg-gradient-to-r from-cyan-500 via-purple-500 to-cyan-500 blur-2xl opacity-40 animate-plasma"></div>
                                <div class="absolute -top-5 left-1/2 -translate-x-1/2 bg-gradient-to-r from-cyan-500 to-purple-600 text-white text-xs font-black px-6 py-2 uppercase tracking-[0.2em] clip-path-polygon z-30 shadow-[0_0_20px_cyan]">
                                    Protocolo Recomendado
                                </div>
                            <?php endif; ?>

                            <div class="holo-card h-full flex flex-col p-8 rounded-sm
                                        <?= $plan['highlight'] ? 'border-cyan-400/80 bg-black' : 'border-white/10 bg-black/60' ?>">
                                
                                <h3 class="text-xl font-black text-white mb-2 tracking-wider uppercase text-center"><?= $plan['name'] ?></h3>
                                <div class="w-12 h-1 bg-cyan-500/50 mx-auto mb-6"></div>

                                <div class="text-center mb-8 relative">
                                    <div class="text-gray-500 line-through text-sm font-mono mb-1">VR: <?= $plan['oldPrice'] ?></div>
                                    <div class="flex items-center justify-center gap-1 relative z-10">
                                        <span class="text-sm text-cyan-300 align-top">R$</span>
                                        <span class="text-6xl font-black text-white tracking-tighter glitch-text"><?= $plan['price'] ?></span>
                                        <span class="text-gray-400 text-xl font-bold self-end mb-2"><?= $plan['period'] ?></span>
                                    </div>
                                    <?php if ($plan['installment']): ?>
                                        <div class="text-purple-300 text-sm mt-2 font-mono font-bold bg-purple-900/30 border border-purple-500/30 inline-block px-4 py-1 rounded-full animate-pulse">
                                            <?= $plan['installment'] ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <ul class="space-y-5 mb-10 flex-1">
                                    <?php foreach ($plan['features'] as $i => $feat): ?>
                                        <li class="flex items-center gap-4 text-sm text-gray-300 group">
                                            <div class="p-1 rounded-sm <?= $plan['highlight'] ? 'bg-cyan-500 text-black shadow-[0_0_10px_cyan]' : 'bg-white/10 text-gray-400 group-hover:text-cyan-500 group-hover:bg-cyan-500/20' ?> transition-all">
                                                <i data-lucide="check-circle-2" class="w-5 h-5"></i>
                                            </div>
                                            <span class="group-hover:text-white transition-colors"><?= $feat ?></span>
                                            <?php if ($plan['highlight'] && $i === 0): ?>
                                                <i data-lucide="zap" class="w-4 h-4 text-yellow-400 animate-bounce ml-auto"></i>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>

                                <?php if ($plan['highlight']): ?>
                                    <button class="btn-conversion w-full py-5 text-lg group relative overflow-hidden">
                                        <span class="relative z-10 flex items-center justify-center gap-3">
                                            ATIVAR NÚCLEO AGORA <i data-lucide="zap-fast" class="w-6 h-6 group-hover:rotate-12 transition-transform"></i>
                                        </span>
                                        <div class="absolute inset-0 bg-white/30 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                                    </button>
                                <?php else: ?>
                                    <button class="w-full py-4 bg-white/5 hover:bg-white/10 border border-white/20 text-white font-bold uppercase tracking-widest transition-all hover:shadow-[0_0_20px_rgba(255,255,255,0.2)]">
                                        Selecionar Básico
                                    </button>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <div class="text-center text-gray-500 font-mono text-xs pb-10 opacity-50">
                    NUCLEO.IA CORP 2050. Protocolo de Segurança Quantica Ativo.
                </div>
             </div>
        </div>

    </main>

    <script>
        function appData() {
            return {
                step: 'hero',
                currentQuizIndex: 0,
                totalQuestions: <?= count($questions) ?>,
                processStatus: "Standby...",
                processPercent: 0,
                timeLeft: 487, // Tempo quebrado para parecer mais real

                initApp() {
                    this.refreshIcons();
                    // Inicializa o Tilt em elementos existentes
                    if (typeof VanillaTilt !== 'undefined') {
                         VanillaTilt.init(document.querySelectorAll("[data-tilt]"));
                    }
                },

                refreshIcons() {
                    // Recarrega ícones e efeitos 3D quando a tela muda
                    setTimeout(() => {
                        lucide.createIcons();
                        if (typeof VanillaTilt !== 'undefined') {
                             VanillaTilt.init(document.querySelectorAll("[data-tilt]"));
                        }
                    }, 50);
                },

                startQuiz() {
                    this.step = 'quiz';
                    this.refreshIcons();
                },

                handleAnswer(questionId, value) {
                    // Gatekeeper: Bloqueia mobile
                    if (questionId === 'gatekeeper' && !value) {
                        this.step = 'block';
                        this.refreshIcons();
                        return;
                    }

                    if (this.currentQuizIndex < this.totalQuestions - 1) {
                        this.currentQuizIndex++;
                        this.refreshIcons();
                        // Scroll suave para o topo da próxima pergunta
                        window.scrollTo({ top: 0, behavior: 'smooth' });
                    } else {
                        this.startProcessing();
                    }
                },

                resetToHero() {
                    this.step = 'hero';
                    this.currentQuizIndex = 0;
                },

                startProcessing() {
                    this.step = 'processing';
                    this.processPercent = 0;
                    
                    // Barra de progresso mais orgânica/rápida
                    let interval = setInterval(() => {
                        if (this.processPercent < 100) {
                            let jump = Math.floor(Math.random() * 5) + 1; // Pula de forma aleatória
                            this.processPercent = Math.min(this.processPercent + jump, 100);
                        } else {
                            clearInterval(interval);
                        }
                    }, 40);

                    // Mensagens de status estilo hacker
                    const statuses = [
                        "Estabelecendo Link Neural...",
                        "Bypass no Firewall Cognitivo...",
                        "Injetando Protocolos de IA...",
                        "Otimizando Rede Neural...",
                        "ACESSANDO NÚCLEO CENTRAL..."
                    ];
                    
                    statuses.forEach((status, index) => {
                        setTimeout(() => this.processStatus = status, index * 800);
                    });
                    
                    setTimeout(() => {
                        this.step = 'sales';
                        this.refreshIcons();
                        this.triggerAdvancedConfetti(); // Explosão final
                        this.startTimer();
                    }, 4500);
                },

                triggerAdvancedConfetti() {
                    // Efeito de "explosão de dados"
                    const colors = ['#00f7ff', '#bd00ff', '#ffffff'];
                    confetti({
                        particleCount: 150, spread: 100, origin: { y: 0.6 }, colors: colors,
                        shapes: ['circle', 'square'], disableForReducedMotion: true
                    });
                    // Segunda onda
                    setTimeout(() => {
                         confetti({ particleCount: 50, angle: 60, spread: 55, origin: { x: 0 }, colors: colors });
                         confetti({ particleCount: 50, angle: 120, spread: 55, origin: { x: 1 }, colors: colors });
                    }, 500);
                },

                startTimer() {
                    setInterval(() => { if (this.timeLeft > 0) this.timeLeft--; }, 1000);
                },

                formatTime(seconds) {
                    const m = Math.floor(seconds / 60);
                    const s = seconds % 60;
                    const ms = Math.floor(Math.random() * 99); // Milissegundos fake para urgência
                    return `${m < 10 ? '0'+m : m}:${s < 10 ? '0'+s : s}:${ms < 10 ? '0'+ms : ms}`;
                }
            }
        }
    </script>
</body>
</html>
