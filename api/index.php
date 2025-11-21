<?php
// --- DADOS DO SISTEMA (PHP) ---
$questions = [
    [
        'id' => 'gatekeeper',
        'question' => "Você tem acesso a um computador/notebook?",
        'subtext' => "O sistema Nucleo IA requer um ambiente desktop (Windows ou Mac) para máxima performance.",
        'options' => [
            ['label' => "Sim, tenho computador", 'value' => true, 'icon' => 'laptop'],
            ['label' => "Não, apenas celular", 'value' => false, 'icon' => 'x']
        ]
    ],
    [
        'id' => 'objective',
        'question' => "Qual seu maior objetivo com IA?",
        'subtext' => null,
        'options' => [
            ['label' => "Produzir Conteúdos", 'icon' => 'pen-tool'],
            ['label' => "Aumentar Vendas", 'icon' => 'zap'],
            ['label' => "Criar Designs", 'icon' => 'image'],
            ['label' => "Dominar Tudo", 'icon' => 'star']
        ]
    ],
    [
        'id' => 'investment',
        'question' => "Quanto você investiria para acessar as melhores IAs?",
        'subtext' => null,
        'options' => [
            ['label' => "Menos de um café/dia", 'icon' => 'coffee'],
            ['label' => "Valor de uma pizza/mês", 'icon' => 'pizza'],
            ['label' => "Qualquer valor por resultado", 'icon' => 'gem'] 
        ]
    ],
    [
        'id' => 'level',
        'question' => "Qual seu nível atual com IA?",
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
        'oldPrice' => "R$ 77,00",
        'price' => "R$ 55,00",
        'period' => "/mês",
        'features' => ["Acesso a 50+ IAs", "Canva Pro Incluso", "Suporte Básico"],
        'highlight' => false,
        'installment' => null
    ],
    [
        'id' => 2,
        'name' => "TRIMESTRAL",
        'oldPrice' => "R$ 180,00",
        'price' => "R$ 120,00",
        'period' => "/trimestre",
        'installment' => "ou 3x R$ 40",
        'features' => ["Acesso a 50+ IAs", "Canva Pro Incluso", "Suporte VIP", "Bônus de Indicação"],
        'highlight' => true // O MAIS ESCOLHIDO
    ],
    [
        'id' => 3,
        'name' => "SEMESTRAL",
        'oldPrice' => "R$ 380,00",
        'price' => "R$ 210,00",
        'period' => "/semestre",
        'installment' => "ou 6x R$ 35",
        'features' => ["Acesso a 50+ IAs", "Canva Pro Incluso", "Mentoria Gravada", "Acesso Imediato"],
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
    <title>Nucleo IA - Acesso VIP</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    
    <script src="https://unpkg.com/lucide@latest"></script>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.8.0/vanilla-tilt.min.js"></script>

    <style>
        body { font-family: 'Inter', sans-serif; }
        
        /* Animações Customizadas */
        .animate-float { animation: float 6s ease-in-out infinite; }
        .animate-pulse-glow { animation: pulseGlow 3s infinite; }
        
        @keyframes float { 0%, 100% { transform: translateY(0px); } 50% { transform: translateY(-20px); } }
        @keyframes pulseGlow { 0%, 100% { box-shadow: 0 0 20px rgba(6, 182, 212, 0.2); } 50% { box-shadow: 0 0 40px rgba(168, 85, 247, 0.5); } }

        /* Scrollbar Personalizada */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #0a0a0a; }
        ::-webkit-scrollbar-thumb { background: #333; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #555; }

        [x-cloak] { display: none !important; }
    </style>
</head>

<body class="bg-[#030305] text-slate-200 antialiased overflow-x-hidden selection:bg-cyan-500/30"
      x-data="appData()" x-init="initApp()">

    <div class="fixed inset-0 z-0 overflow-hidden pointer-events-none">
        <div class="absolute top-[-10%] left-[-10%] w-[600px] h-[600px] bg-purple-600/20 rounded-full blur-[120px] animate-pulse-glow mix-blend-screen"></div>
        <div class="absolute top-[20%] right-[-5%] w-[500px] h-[500px] bg-cyan-500/20 rounded-full blur-[100px] animate-float mix-blend-screen"></div>
        <div class="absolute bottom-[-10%] left-[20%] w-[800px] h-[800px] bg-blue-600/10 rounded-full blur-[150px] mix-blend-screen"></div>
        <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20 mix-blend-overlay"></div>
        
        <div class="absolute inset-0 bg-[linear-gradient(rgba(255,255,255,0.03)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.03)_1px,transparent_1px)] bg-[size:100px_100px] [mask-image:radial-gradient(ellipse_60%_60%_at_50%_50%,#000_70%,transparent_100%)]"></div>
    </div>

    <main class="relative z-10 min-h-screen flex flex-col">
        
        <div x-show="step === 'hero'" 
             class="flex flex-col items-center justify-center min-h-screen px-6 py-20 text-center"
             data-aos="fade-up" data-aos-duration="1000">
            
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/5 border border-white/10 mb-8 backdrop-blur-md hover:bg-white/10 transition-colors cursor-default">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                </span>
                <span class="text-xs font-medium text-gray-300 uppercase tracking-widest">Sistema V3.0 Online</span>
            </div>

            <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 tracking-tight leading-tight drop-shadow-2xl">
                O Futuro da <br />
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-purple-400 to-pink-400 animate-pulse-glow">
                    Inteligência Artificial
                </span>
            </h1>

            <p class="text-lg text-gray-400 max-w-2xl mb-10 leading-relaxed">
                Pare de pagar <span class="text-red-400 line-through decoration-red-400/50">R$ 4.000/mês</span> em ferramentas separadas.
                <br/>Desbloqueie o <strong class="text-white">poder total</strong> por apenas <span class="text-green-400 font-bold bg-green-400/10 px-2 py-0.5 rounded">R$ 40/mês</span>.
            </p>

            <div data-tilt data-tilt-scale="1.1" class="inline-block">
                <button @click="startQuiz()" 
                        class="group relative px-10 py-5 bg-white text-black font-bold text-xl rounded-full overflow-hidden transition-all shadow-[0_0_50px_-10px_rgba(255,255,255,0.3)] hover:shadow-[0_0_70px_-10px_rgba(6,182,212,0.6)]">
                    <div class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-cyan-400/50 to-transparent -translate-x-full group-hover:animate-[shimmer_1s_infinite]"></div>
                    <span class="relative flex items-center gap-2">
                        INICIAR ANÁLISE <i data-lucide="arrow-right" class="w-5 h-5 transition-transform group-hover:translate-x-1"></i>
                    </span>
                </button>
            </div>

            <div class="mt-20 grid grid-cols-4 gap-8 opacity-60 grayscale hover:grayscale-0 transition-all duration-700">
               <div class="flex flex-col items-center animate-float" style="animation-delay: 0s"><div class="w-12 h-12 rounded-xl bg-green-500/20 mb-2 border border-green-500/30"></div><span class="text-xs font-mono">GPT-5</span></div>
               <div class="flex flex-col items-center animate-float" style="animation-delay: 1s"><div class="w-12 h-12 rounded-xl bg-blue-500/20 mb-2 border border-blue-500/30"></div><span class="text-xs font-mono">Midjourney</span></div>
               <div class="flex flex-col items-center animate-float" style="animation-delay: 2s"><div class="w-12 h-12 rounded-xl bg-purple-500/20 mb-2 border border-purple-500/30"></div><span class="text-xs font-mono">Leonardo</span></div>
               <div class="flex flex-col items-center animate-float" style="animation-delay: 3s"><div class="w-12 h-12 rounded-xl bg-orange-500/20 mb-2 border border-orange-500/30"></div><span class="text-xs font-mono">Claude</span></div>
            </div>
        </div>

        <div x-show="step === 'quiz'" x-cloak
             class="flex flex-col items-center justify-center min-h-screen px-4 w-full max-w-2xl mx-auto transition-all duration-500">
            
            <div class="w-full mb-8 flex items-center gap-4" data-aos="fade-down">
                <span class="text-xs font-mono text-cyan-400 font-bold" x-text="'0' + (currentQuizIndex + 1)"></span>
                <div class="h-1.5 flex-1 bg-white/10 rounded-full overflow-hidden">
                    <div class="h-full bg-gradient-to-r from-cyan-400 via-purple-500 to-pink-500 transition-all duration-500 shadow-[0_0_10px_rgba(168,85,247,0.5)]"
                         :style="'width: ' + (((currentQuizIndex + 1) / totalQuestions) * 100) + '%'"></div>
                </div>
                <span class="text-xs font-mono text-gray-500" x-text="'0' + totalQuestions"></span>
            </div>

            <?php foreach ($questions as $index => $q): ?>
                <div x-show="currentQuizIndex === <?= $index ?>" 
                     x-transition:enter="transition ease-out duration-500"
                     x-transition:enter-start="opacity-0 translate-y-10 scale-95"
                     x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                     data-tilt data-tilt-max="3" data-tilt-speed="400" data-tilt-glare data-tilt-max-glare="0.1"
                     class="w-full backdrop-blur-2xl bg-white/5 border border-white/10 shadow-[0_8px_32px_0_rgba(0,0,0,0.36)] rounded-3xl p-8 md:p-12 relative overflow-hidden group">
                    
                    <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-white/40 to-transparent opacity-50 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="absolute -left-20 -top-20 w-40 h-40 bg-purple-500/20 rounded-full blur-[80px]"></div>

                    <h2 class="text-2xl md:text-3xl font-bold text-white mb-2 leading-snug relative z-10"><?= $q['question'] ?></h2>
                    
                    <?php if ($q['subtext']): ?>
                        <p class="text-gray-400 text-sm mb-8 relative z-10"><?= $q['subtext'] ?></p>
                    <?php else: ?>
                        <div class="mb-8"></div>
                    <?php endif; ?>

                    <div class="space-y-3 relative z-10">
                        <?php foreach ($q['options'] as $opt): ?>
                            <button @click="handleAnswer('<?= $q['id'] ?>', '<?= isset($opt['value']) ? $opt['value'] : $opt['label'] ?>')"
                                    class="w-full text-left p-4 rounded-xl border border-white/5 bg-white/5 hover:bg-white/10 hover:border-cyan-500/50 hover:shadow-[0_0_30px_-5px_rgba(6,182,212,0.2)] transition-all duration-200 group/btn flex items-center gap-4">
                                
                                <span class="text-2xl filter grayscale group-hover/btn:grayscale-0 transition-all duration-300 scale-100 group-hover/btn:scale-110 group-hover/btn:rotate-6">
                                    <?php if(isset($opt['icon'])): ?>
                                        <i data-lucide="<?= $opt['icon'] ?>" class="w-5 h-5"></i>
                                    <?php elseif(isset($opt['emoji'])): ?>
                                        <?= $opt['emoji'] ?>
                                    <?php endif; ?>
                                </span>
                                
                                <span class="text-gray-300 font-medium group-hover/btn:text-white transition-colors"><?= $opt['label'] ?></span>
                                
                                <div class="ml-auto opacity-0 group-hover/btn:opacity-100 transition-all transform translate-x-[-10px] group-hover/btn:translate-x-0">
                                    <i data-lucide="chevron-right" class="w-5 h-5 text-cyan-400"></i>
                                </div>
                            </button>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div x-show="step === 'block'" x-cloak
             class="flex flex-col items-center justify-center min-h-screen px-6 text-center">
            <div data-tilt class="backdrop-blur-xl bg-red-500/5 border border-red-500/30 shadow-[0_0_50px_-10px_rgba(239,68,68,0.3)] rounded-3xl p-10 max-w-md relative overflow-hidden">
                <i data-lucide="alert-triangle" class="w-12 h-12 text-red-500 mx-auto mb-6 animate-pulse"></i>
                <h2 class="text-2xl font-bold text-white mb-4">Acesso Restrito</h2>
                <p class="text-gray-400 mb-8">
                    Detectamos que você está sem computador. A Nucleo IA é uma ferramenta profissional que exige Windows ou Mac.
                </p>
                <button @click="resetToHero()" 
                        class="px-6 py-2 bg-white/10 hover:bg-white/20 rounded-lg text-white text-sm transition-colors border border-white/5">
                    Voltar ao Início
                </button>
            </div>
        </div>

        <div x-show="step === 'processing'" x-cloak
             class="flex flex-col items-center justify-center min-h-screen px-6">
            <div class="w-32 h-32 mb-8 relative">
                 <div class="absolute inset-0 border-4 border-white/5 rounded-full"></div>
                 <div class="absolute inset-0 border-4 border-t-cyan-500 border-r-purple-500 border-b-pink-500 border-l-transparent rounded-full animate-spin"></div>
                 <div class="absolute inset-0 m-auto flex items-center justify-center animate-pulse">
                    <i data-lucide="sparkles" class="w-10 h-10 text-white drop-shadow-[0_0_15px_rgba(255,255,255,0.8)]"></i>
                 </div>
            </div>
            <h2 class="text-2xl font-medium text-white mb-2 tracking-wide text-center" x-text="processStatus"></h2>
            <div class="text-cyan-400 font-mono text-xl font-bold"><span x-text="processPercent"></span>%</div>
        </div>

        <div x-show="step === 'sales'" x-cloak
             class="min-h-screen py-20 px-4 overflow-y-auto w-full">
             
             <div class="text-center mb-16" data-aos="zoom-in">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-green-500/10 border border-green-500/30 text-green-400 text-sm font-bold mb-6 shadow-[0_0_20px_-5px_rgba(34,197,94,0.3)]">
                    <i data-lucide="check-circle-2" class="w-4 h-4"></i>
                    <span>PERFIL APROVADO</span>
                </div>
                <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 drop-shadow-xl">
                    Seu Plano <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-purple-400 underline decoration-purple-500/50">Núcleo IA</span>
                </h1>
                <p class="text-gray-400 max-w-xl mx-auto text-lg">
                    Desbloqueie acesso imediato às 50+ IAs mais poderosas do mercado por uma fração do preço.
                </p>
             </div>

             <div data-tilt data-tilt-max="2" class="relative backdrop-blur-xl bg-yellow-500/5 border border-yellow-500/20 shadow-[0_0_40px_-10px_rgba(234,179,8,0.1)] rounded-3xl max-w-3xl mx-auto mb-16 p-8 overflow-hidden"
                  data-aos="fade-up" data-aos-delay="200">
                <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-yellow-500/40 to-transparent opacity-50"></div>
                
                <div class="flex flex-col items-center text-center relative z-10">
                    <div class="p-3 bg-yellow-500/10 rounded-full mb-4 animate-bounce">
                        <i data-lucide="gem" class="w-8 h-8 text-yellow-400"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-white mb-2">Missão: Mensalidade Zero</h2>
                    <p class="text-gray-400 text-sm mb-8">Indique amigos e zere seu custo. O sistema paga você.</p>
                    
                    <div class="w-full grid grid-cols-3 gap-4">
                        <div class="p-4 rounded-xl bg-white/5 border border-white/10 flex flex-col justify-center">
                            <div class="text-xs text-gray-500 uppercase mb-1">Meta 1</div>
                            <div class="text-white font-bold text-xl">R$ 0</div>
                            <div class="text-[10px] text-gray-400">2 Amigos</div>
                        </div>
                        <div class="p-4 rounded-xl bg-gradient-to-br from-yellow-500/20 to-orange-500/20 border border-yellow-500/50 relative overflow-hidden shadow-lg transform scale-105 border-t-2 border-t-yellow-400">
                             <div class="text-xs text-yellow-400 uppercase mb-1 font-bold flex justify-center items-center gap-1"><i data-lucide="star" class="w-3 h-3"></i> Meta 2</div>
                             <div class="text-white font-bold text-2xl">+R$ 60</div>
                             <div class="text-[10px] text-gray-300">5 Amigos</div>
                        </div>
                        <div class="p-4 rounded-xl bg-white/5 border border-white/10 flex flex-col justify-center">
                             <div class="text-xs text-gray-500 uppercase mb-1">Meta 3</div>
                             <div class="text-white font-bold text-xl">+R$ 160</div>
                             <div class="text-[10px] text-gray-400">10 Amigos</div>
                        </div>
                    </div>
                </div>
             </div>

             <div class="flex justify-center mb-12" data-aos="fade-in">
                <div class="flex items-center gap-3 px-6 py-3 rounded-full bg-black/40 border border-white/10 backdrop-blur-md shadow-2xl">
                    <i data-lucide="timer" class="w-4 h-4 text-red-400 animate-pulse"></i>
                    <span class="text-gray-300 font-mono text-lg tracking-widest" x-text="formatTime(timeLeft)"></span>
                    <span class="text-xs text-gray-500 uppercase tracking-wider">para expirar</span>
                </div>
             </div>

             <div class="max-w-6xl mx-auto grid md:grid-cols-3 gap-8 px-2 pb-20">
                <?php foreach ($plans as $plan): ?>
                    <div class="relative transition-all duration-300 group" 
                         data-aos="fade-up" data-aos-delay="<?= $plan['id'] * 100 ?>"
                         :class="<?= $plan['highlight'] ? "'scale-105 z-10'" : "'scale-100 opacity-90 hover:opacity-100 hover:scale-[1.02]'" ?>">
                        
                        <?php if ($plan['highlight']): ?>
                        <div class="absolute -top-5 left-0 right-0 flex justify-center z-20">
                             <div class="bg-gradient-to-r from-cyan-500 to-blue-500 text-black font-black text-xs px-4 py-1.5 rounded-full shadow-[0_0_20px_rgba(6,182,212,0.5)] flex items-center gap-1 animate-pulse-glow">
                                <i data-lucide="star" class="w-3 h-3 fill-black"></i> RECOMENDADO
                             </div>
                        </div>
                        <?php endif; ?>

                        <div data-tilt data-tilt-max="5" data-tilt-glare data-tilt-max-glare="0.2"
                             class="backdrop-blur-xl bg-white/5 border shadow-[0_8px_32px_0_rgba(0,0,0,0.5)] rounded-3xl overflow-hidden h-full p-8 flex flex-col relative
                                    <?= $plan['highlight'] ? 'border-cyan-500/40 bg-cyan-900/10' : 'border-white/10' ?>">
                             
                             <div class="absolute top-0 right-0 w-32 h-32 bg-white/5 rounded-full blur-[50px] pointer-events-none"></div>

                             <div class="mb-4 relative z-10">
                                <span class="text-xs font-bold uppercase tracking-widest <?= $plan['highlight'] ? 'text-cyan-400' : 'text-gray-400' ?>">
                                    <?= $plan['name'] ?>
                                </span>
                             </div>

                             <div class="text-gray-500 line-through text-sm relative z-10">De <?= $plan['oldPrice'] ?></div>
                             <div class="flex items-baseline gap-1 mb-2 relative z-10">
                                <span class="text-5xl font-black text-white tracking-tight"><?= $plan['price'] ?></span>
                                <span class="text-gray-400 text-sm"><?= $plan['period'] ?></span>
                             </div>

                             <?php if ($plan['installment']): ?>
                                <div class="text-cyan-300 text-xs font-bold mb-8 bg-cyan-500/10 border border-cyan-500/20 inline-block px-3 py-1 rounded-lg w-max relative z-10">
                                    <?= $plan['installment'] ?>
                                </div>
                             <?php else: ?>
                                <div class="mb-8 h-7"></div>
                             <?php endif; ?>

                             <div class="space-y-4 mb-8 flex-1 relative z-10">
                                <?php foreach ($plan['features'] as $feat): ?>
                                    <div class="flex items-start gap-3 text-sm text-gray-300 group-hover:text-white transition-colors">
                                        <div class="p-0.5 rounded-full <?= $plan['highlight'] ? 'bg-cyan-500/20' : 'bg-white/10' ?>">
                                            <i data-lucide="check" class="w-3 h-3 <?= $plan['highlight'] ? 'text-cyan-400' : 'text-gray-500' ?>"></i>
                                        </div>
                                        <?= $feat ?>
                                    </div>
                                <?php endforeach; ?>
                             </div>

                             <button class="w-full py-4 rounded-xl font-bold text-sm uppercase tracking-wide transition-all hover:shadow-[0_0_30px_rgba(255,255,255,0.2)] relative z-10
                                            <?= $plan['highlight'] ? 'bg-gradient-to-r from-cyan-400 to-blue-500 text-black border-none hover:scale-[1.03]' : 'bg-white/10 text-white hover:bg-white/20 border border-white/10' ?>">
                                Começar Agora
                             </button>
                        </div>
                    </div>
                <?php endforeach; ?>
             </div>
        </div>

    </main>

    <script>
        function appData() {
            return {
                step: 'hero',
                currentQuizIndex: 0,
                totalQuestions: <?= count($questions) ?>,
                processStatus: "Iniciando conexão segura...",
                processPercent: 0,
                timeLeft: 742,

                initApp() {
                    this.updateIcons();
                    // Inicializa a biblioteca de animação de scroll
                    AOS.init();
                },

                updateIcons() {
                    setTimeout(() => {
                        lucide.createIcons();
                        // Reinicializa o efeito Tilt nos novos elementos
                        if (typeof VanillaTilt !== 'undefined') {
                            VanillaTilt.init(document.querySelectorAll("[data-tilt]"));
                        }
                    }, 50);
                },

                startQuiz() {
                    this.step = 'quiz';
                    this.updateIcons();
                },

                handleAnswer(questionId, value) {
                    if (questionId === 'gatekeeper' && (value === false || value === 'false' || value === 0)) {
                        this.step = 'block';
                        this.updateIcons();
                        return;
                    }

                    if (this.currentQuizIndex < this.totalQuestions - 1) {
                        this.currentQuizIndex++;
                        this.updateIcons();
                    } else {
                        this.startProcessing();
                    }
                },

                resetToHero() {
                    this.step = 'hero';
                    this.currentQuizIndex = 0;
                    this.updateIcons();
                },

                startProcessing() {
                    this.step = 'processing';
                    this.processPercent = 0;
                    this.updateIcons();
                    
                    let interval = setInterval(() => {
                        if (this.processPercent < 100) {
                            this.processPercent++;
                        } else {
                            clearInterval(interval);
                        }
                    }, 40);

                    setTimeout(() => this.processStatus = "Analisando perfil comportamental...", 1500);
                    setTimeout(() => this.processStatus = "Aplicando descontos exclusivos...", 2500);
                    setTimeout(() => this.processStatus = "Liberando acesso premium...", 3500);
                    
                    setTimeout(() => {
                        this.step = 'sales';
                        this.updateIcons();
                        this.triggerConfetti(); // SOLTA OS CONFETES!
                        this.startTimer();
                    }, 4500);
                },

                triggerConfetti() {
                    // Explosão de confetes usando a biblioteca canvas-confetti
                    var duration = 3 * 1000;
                    var animationEnd = Date.now() + duration;
                    var defaults = { startVelocity: 30, spread: 360, ticks: 60, zIndex: 0 };

                    var random = function(min, max) { return Math.random() * (max - min) + min; };

                    var interval = setInterval(function() {
                        var timeLeft = animationEnd - Date.now();

                        if (timeLeft <= 0) {
                            return clearInterval(interval);
                        }

                        var particleCount = 50 * (timeLeft / duration);
                        confetti(Object.assign({}, defaults, { particleCount, origin: { x: random(0.1, 0.3), y: Math.random() - 0.2 } }));
                        confetti(Object.assign({}, defaults, { particleCount, origin: { x: random(0.7, 0.9), y: Math.random() - 0.2 } }));
                    }, 250);
                },

                startTimer() {
                    setInterval(() => {
                        if (this.timeLeft > 0) this.timeLeft--;
                    }, 1000);
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
