<?php
// --- DADOS DO SISTEMA (PHP) ---
$questions = [
    [
        'id' => 'gatekeeper',
        'question' => "Você possui um computador ou notebook?",
        'subtext' => "Para alta performance, o Nucleo IA foi otimizado para ambiente desktop.",
        'options' => [
            ['label' => "Sim, possuo computador", 'value' => true, 'icon' => 'laptop'],
            ['label' => "Não, apenas celular", 'value' => false, 'icon' => 'smartphone']
        ]
    ],
    [
        'id' => 'objective',
        'question' => "Qual seu objetivo principal?",
        'subtext' => null,
        'options' => [
            ['label' => "Escalar Produção", 'icon' => 'rocket'],
            ['label' => "Aumentar Faturamento", 'icon' => 'trending-up'],
            ['label' => "Design & Criativos", 'icon' => 'palette'],
            ['label' => "Automação Total", 'icon' => 'bot']
        ]
    ],
    [
        'id' => 'investment',
        'question' => "Quanto vale o seu tempo hoje?",
        'subtext' => null,
        'options' => [
            ['label' => "Valor simbólico (Café)", 'icon' => 'coffee'],
            ['label' => "Investimento baixo (Pizza)", 'icon' => 'pizza'],
            ['label' => "Foco no ROI (Retorno)", 'icon' => 'gem'] 
        ]
    ],
    [
        'id' => 'level',
        'question' => "Seu nível de experiência:",
        'subtext' => null,
        'options' => [
            ['label' => "Iniciante", 'emoji' => "🌱"],
            ['label' => "Intermediário", 'emoji' => "⚡"],
            ['label' => "Avançado", 'emoji' => "🧠"]
        ]
    ]
];

$plans = [
    [
        'id' => 1,
        'name' => "MENSAL",
        'oldPrice' => "R$ 97,00",
        'price' => "R$ 55,00",
        'period' => "/mês",
        'features' => ["Acesso a 50+ IAs", "Canva Pro Incluso", "Suporte Básico"],
        'highlight' => false,
        'installment' => null
    ],
    [
        'id' => 2,
        'name' => "TRIMESTRAL",
        'oldPrice' => "R$ 197,00",
        'price' => "R$ 120,00",
        'period' => "/trimestre",
        'installment' => "ou 3x R$ 40",
        'features' => ["Acesso a 50+ IAs", "Canva Pro Incluso", "Grupo VIP Networking", "Prioridade no Suporte"],
        'highlight' => true // DESTAQUE
    ],
    [
        'id' => 3,
        'name' => "SEMESTRAL",
        'oldPrice' => "R$ 497,00",
        'price' => "R$ 210,00",
        'period' => "/semestre",
        'installment' => "ou 6x R$ 35",
        'features' => ["Acesso a 50+ IAs", "Canva Pro Incluso", "Mentoria Gravada", "Setup Imediato"],
        'highlight' => false,
        'installment' => "ou 6x R$ 35"
    ]
];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nucleo IA - Acesso Premium</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    
    <script src="https://unpkg.com/lucide@latest"></script>

    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;600;700&display=swap');
        
        body { 
            font-family: 'Space Grotesk', sans-serif; 
            background-color: #000000;
        }

        /* Background Gradeado Moderno */
        .bg-grid {
            background-size: 50px 50px;
            background-image: linear-gradient(to right, rgba(255, 255, 255, 0.05) 1px, transparent 1px),
                              linear-gradient(to bottom, rgba(255, 255, 255, 0.05) 1px, transparent 1px);
        }
        
        .animate-pulse-glow { animation: pulseGlow 3s infinite alternate; }
        .animate-float-slow { animation: float 8s ease-in-out infinite; }
        
        @keyframes pulseGlow { 
            from { box-shadow: 0 0 10px rgba(6, 182, 212, 0.1); } 
            to { box-shadow: 0 0 25px rgba(6, 182, 212, 0.4); } 
        }
        @keyframes float { 0%, 100% { transform: translateY(0px); } 50% { transform: translateY(-15px); } }

        /* Scrollbar Invisível */
        ::-webkit-scrollbar { width: 0px; background: transparent; }

        [x-cloak] { display: none !important; }
    </style>
</head>

<body class="text-white antialiased h-screen overflow-hidden selection:bg-cyan-500/90 selection:text-black"
      x-data="appData()" x-init="initApp()">

    <div class="fixed inset-0 z-0 pointer-events-none bg-black">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,_var(--tw-gradient-stops))] from-slate-900 via-black to-black"></div>
        
        <div class="absolute inset-0 bg-grid [mask-image:linear-gradient(to_bottom,white,transparent)]"></div>
        
        <div class="absolute top-[-100px] left-1/2 -translate-x-1/2 w-[600px] h-[300px] bg-cyan-500/20 blur-[120px] rounded-full"></div>
        <div class="absolute bottom-[-100px] right-[-100px] w-[500px] h-[500px] bg-purple-600/10 blur-[100px] rounded-full"></div>
    </div>

    <main class="relative z-10 h-full overflow-y-auto w-full flex flex-col">
        
        <header class="w-full p-6 flex justify-between items-center max-w-6xl mx-auto absolute top-0 left-0 right-0 z-50">
            <div class="flex items-center gap-2">
                <div class="w-3 h-3 bg-cyan-400 rounded-full animate-pulse"></div>
                <span class="font-bold tracking-widest text-sm text-cyan-400/80">NUCLEO.IA</span>
            </div>
            <div class="text-xs text-gray-500 font-mono hidden md:block">SYSTEM STATUS: ONLINE</div>
        </header>

        <div x-show="step === 'hero'" 
             x-transition:enter="transition ease-out duration-700"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             class="flex-1 flex flex-col items-center justify-center px-6 text-center min-h-screen">
            
            <div class="mb-6 relative group cursor-default">
                <div class="absolute -inset-1 bg-gradient-to-r from-cyan-500 to-purple-600 rounded-full blur opacity-25 group-hover:opacity-75 transition duration-1000 group-hover:duration-200"></div>
                <div class="relative px-4 py-1 bg-black rounded-full border border-white/10 flex items-center gap-2">
                    <span class="text-xs font-bold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-purple-400">NOVA VERSÃO 4.0</span>
                </div>
            </div>

            <h1 class="text-5xl md:text-8xl font-bold text-white mb-6 tracking-tighter leading-none">
                INTELIGÊNCIA <br />
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-white drop-shadow-[0_0_15px_rgba(34,211,238,0.3)]">
                    ILIMITADA
                </span>
            </h1>

            <p class="text-lg text-gray-400 max-w-xl mb-10 font-light">
                Acesse as ferramentas mais poderosas do mundo em um único painel. Sem limites. Sem complicações.
            </p>

            <button @click="startQuiz()" 
                    class="group relative px-8 py-4 bg-cyan-500 text-black font-bold text-lg rounded-lg overflow-hidden transition-all hover:scale-105 hover:shadow-[0_0_40px_rgba(6,182,212,0.6)]">
                <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                <span class="relative flex items-center gap-3">
                    COMEÇAR AGORA <i data-lucide="arrow-right" class="w-5 h-5"></i>
                </span>
            </button>

            <div class="mt-16 flex gap-6 opacity-40 grayscale hover:grayscale-0 transition-all duration-500">
                 <i data-lucide="cpu" class="w-6 h-6"></i>
                 <i data-lucide="zap" class="w-6 h-6"></i>
                 <i data-lucide="shield-check" class="w-6 h-6"></i>
                 <i data-lucide="globe" class="w-6 h-6"></i>
            </div>
        </div>

        <div x-show="step === 'quiz'" x-cloak
             class="flex-1 flex flex-col items-center justify-center px-4 w-full max-w-xl mx-auto min-h-screen py-20">
            
            <div class="w-full mb-12">
                <div class="flex justify-between text-xs font-mono text-gray-500 mb-2">
                    <span>PASSO <span x-text="currentQuizIndex + 1"></span></span>
                    <span><span x-text="totalQuestions"></span> FINAL</span>
                </div>
                <div class="h-0.5 w-full bg-gray-800">
                    <div class="h-full bg-cyan-400 shadow-[0_0_10px_rgba(34,211,238,0.8)] transition-all duration-500"
                         :style="'width: ' + (((currentQuizIndex + 1) / totalQuestions) * 100) + '%'"></div>
                </div>
            </div>

            <?php foreach ($questions as $index => $q): ?>
                <div x-show="currentQuizIndex === <?= $index ?>" 
                     x-transition:enter="transition ease-out duration-500"
                     x-transition:enter-start="opacity-0 translate-x-20"
                     x-transition:enter-end="opacity-100 translate-x-0"
                     class="w-full">
                    
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-3 leading-tight"><?= $q['question'] ?></h2>
                    
                    <p class="text-gray-400 text-sm mb-10 border-l-2 border-gray-700 pl-4"><?= $q['subtext'] ?? 'Selecione a opção que melhor se adapta à sua realidade atual.' ?></p>

                    <div class="space-y-3">
                        <?php foreach ($q['options'] as $opt): ?>
                            <button @click="handleAnswer('<?= $q['id'] ?>', '<?= isset($opt['value']) ? $opt['value'] : $opt['label'] ?>')"
                                    class="w-full text-left p-5 rounded-lg border border-white/10 bg-white/[0.02] hover:bg-cyan-500/10 hover:border-cyan-500/50 hover:shadow-[0_0_20px_rgba(6,182,212,0.1)] transition-all duration-200 group flex items-center gap-4">
                                
                                <div class="w-10 h-10 rounded bg-gray-900 flex items-center justify-center border border-white/5 group-hover:border-cyan-500/50 group-hover:bg-cyan-500/20 transition-colors">
                                    <?php if(isset($opt['icon'])): ?>
                                        <i data-lucide="<?= $opt['icon'] ?>" class="w-5 h-5 text-gray-400 group-hover:text-cyan-400"></i>
                                    <?php elseif(isset($opt['emoji'])): ?>
                                        <span class="text-lg"><?= $opt['emoji'] ?></span>
                                    <?php endif; ?>
                                </div>
                                
                                <span class="text-gray-300 font-medium group-hover:text-white text-lg"><?= $opt['label'] ?></span>
                            </button>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div x-show="step === 'block'" x-cloak
             class="flex-1 flex flex-col items-center justify-center px-6 text-center min-h-screen">
            <div class="p-8 border border-red-900/50 bg-red-900/10 rounded-2xl max-w-md">
                <i data-lucide="shield-alert" class="w-16 h-16 text-red-500 mx-auto mb-6"></i>
                <h2 class="text-2xl font-bold text-white mb-2">Dispositivo Incompatível</h2>
                <p class="text-gray-400 mb-8 text-sm">
                    Para garantir a potência total das IAs, nosso sistema bloqueia acessos via Mobile. Por favor, acesse via Desktop.
                </p>
                <button @click="resetToHero()" 
                        class="px-6 py-3 bg-white text-black font-bold rounded hover:bg-gray-200 transition-colors w-full">
                    Entendido
                </button>
            </div>
        </div>

        <div x-show="step === 'processing'" x-cloak
             class="flex-1 flex flex-col items-center justify-center min-h-screen px-6 bg-black">
            
            <div class="w-full max-w-md space-y-1">
                <div class="flex justify-between text-xs font-mono text-cyan-500">
                    <span x-text="processStatus"></span>
                    <span x-text="processPercent + '%'"></span>
                </div>
                <div class="h-1 w-full bg-gray-900 rounded-full overflow-hidden">
                    <div class="h-full bg-cyan-500 shadow-[0_0_15px_cyan]" :style="'width: ' + processPercent + '%'"></div>
                </div>
            </div>

            <div class="mt-12 grid grid-cols-5 gap-2 opacity-20">
                <?php for($i=0; $i<10; $i++): ?>
                    <div class="h-8 w-full bg-gray-800 rounded animate-pulse" style="animation-delay: <?= $i * 100 ?>ms"></div>
                <?php endfor; ?>
            </div>
        </div>

        <div x-show="step === 'sales'" x-cloak
             class="flex-1 py-20 px-4 overflow-y-auto w-full min-h-screen bg-black/90 backdrop-blur-xl">
             
             <div class="max-w-5xl mx-auto">
                <div class="text-center mb-16">
                    <div class="inline-flex items-center gap-2 px-4 py-1 rounded border border-green-500/30 bg-green-900/10 text-green-400 text-xs font-bold mb-6 uppercase tracking-widest">
                        <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                        Acesso Liberado
                    </div>
                    <h1 class="text-4xl md:text-6xl font-bold text-white mb-6">
                        Escolha seu <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-500">Protocolo</span>
                    </h1>
                </div>

                <div class="flex justify-center mb-12">
                    <div class="flex items-center gap-4 px-6 py-3 border border-red-500/30 bg-red-950/10 rounded w-full max-w-md justify-center">
                        <span class="text-red-400 font-mono text-xl font-bold" x-text="formatTime(timeLeft)"></span>
                        <span class="text-xs text-red-300 uppercase tracking-wider border-l border-red-500/30 pl-4">Oferta Exclusiva Expira em breve</span>
                    </div>
                </div>

                <div class="grid md:grid-cols-3 gap-6 pb-20">
                    <?php foreach ($plans as $plan): ?>
                        <div class="relative group <?= $plan['highlight'] ? 'md:-mt-4 md:mb-4 z-10' : '' ?>">
                            
                            <?php if ($plan['highlight']): ?>
                                <div class="absolute inset-0 bg-gradient-to-b from-cyan-500/20 to-purple-500/20 blur-xl"></div>
                                <div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-gradient-to-r from-cyan-500 to-purple-600 text-white text-[10px] font-bold px-3 py-1 rounded uppercase tracking-widest z-20">
                                    Recomendado
                                </div>
                            <?php endif; ?>

                            <div class="h-full bg-[#0A0A0A] border hover:border-cyan-500/50 transition-all duration-300 rounded-xl p-8 flex flex-col relative overflow-hidden
                                        <?= $plan['highlight'] ? 'border-cyan-500/50 shadow-[0_0_30px_rgba(6,182,212,0.1)]' : 'border-white/10' ?>">
                                
                                <div class="mb-4">
                                    <h3 class="text-lg font-bold text-white"><?= $plan['name'] ?></h3>
                                </div>

                                <div class="mb-6">
                                    <div class="text-gray-500 line-through text-sm">De <?= $plan['oldPrice'] ?></div>
                                    <div class="flex items-baseline gap-1">
                                        <span class="text-4xl font-bold text-white"><?= $plan['price'] ?></span>
                                        <span class="text-gray-500 text-sm"><?= $plan['period'] ?></span>
                                    </div>
                                    <?php if ($plan['installment']): ?>
                                        <div class="text-cyan-400 text-xs mt-1 font-mono"><?= $plan['installment'] ?></div>
                                    <?php endif; ?>
                                </div>

                                <ul class="space-y-4 mb-8 flex-1">
                                    <?php foreach ($plan['features'] as $feat): ?>
                                        <li class="flex items-center gap-3 text-sm text-gray-400 group-hover:text-gray-200">
                                            <i data-lucide="check" class="w-4 h-4 text-cyan-500"></i>
                                            <?= $feat ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>

                                <button class="w-full py-3 rounded font-bold text-sm uppercase tracking-wider transition-all
                                               <?= $plan['highlight'] ? 'bg-cyan-500 text-black hover:bg-cyan-400 hover:shadow-[0_0_20px_cyan]' : 'bg-white/5 text-white hover:bg-white/10 border border-white/10' ?>">
                                    Selecionar Plano
                                </button>
                            </div>
                        </div>
                    <?php endforeach; ?>
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
                processStatus: "Inicializando...",
                processPercent: 0,
                timeLeft: 600,

                initApp() {
                    this.refreshIcons();
                },

                refreshIcons() {
                    setTimeout(() => lucide.createIcons(), 50);
                },

                startQuiz() {
                    this.step = 'quiz';
                    this.refreshIcons();
                },

                handleAnswer(questionId, value) {
                    if (questionId === 'gatekeeper' && !value) {
                        this.step = 'block';
                        this.refreshIcons();
                        return;
                    }

                    if (this.currentQuizIndex < this.totalQuestions - 1) {
                        this.currentQuizIndex++;
                        this.refreshIcons();
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
                    
                    let interval = setInterval(() => {
                        if (this.processPercent < 100) {
                            this.processPercent += 2; // Mais rápido
                        } else {
                            clearInterval(interval);
                        }
                    }, 50);

                    setTimeout(() => this.processStatus = "Validando Credenciais...", 1000);
                    setTimeout(() => this.processStatus = "Descriptografando Oferta...", 2000);
                    
                    setTimeout(() => {
                        this.step = 'sales';
                        this.refreshIcons();
                        this.triggerConfetti();
                        this.startTimer();
                    }, 3500);
                },

                triggerConfetti() {
                    confetti({
                        particleCount: 100,
                        spread: 70,
                        origin: { y: 0.6 },
                        colors: ['#22d3ee', '#a855f7', '#ffffff'] // Cores do tema (Cyan, Roxo, Branco)
                    });
                },

                startTimer() {
                    setInterval(() => { if (this.timeLeft > 0) this.timeLeft--; }, 1000);
                },

                formatTime(seconds) {
                    const m = Math.floor(seconds / 60);
                    const s = seconds % 60;
                    return `${m}:${s < 10 ? '0'+s : s}`;
                }
            }
        }
    </script>
</body>
</html>
