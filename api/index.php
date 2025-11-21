<?php
// --- DADOS DO SISTEMA (PHP) ---
// O PHP renderiza esses dados no HTML. Isso facilita a edição posterior sem mexer no JS.

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
            ['label' => "Qualquer valor por resultado", 'icon' => 'gem'] // Diamond -> gem no lucide
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
    <title>Nucleo IA - Acesso</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body { font-family: 'Inter', sans-serif; }
        
        .animate-float { animation: float 10s ease-in-out infinite; }
        .animate-pulse-slow { animation: pulse 8s ease-in-out infinite; }
        .animate-shimmer { animation: shimmer 2s infinite; }
        .animate-spin-slow { animation: spin 3s linear infinite; }
        
        @keyframes float { 0%, 100% { transform: translateY(0px); } 50% { transform: translateY(-20px); } }
        @keyframes shimmer { 100% { transform: translateX(100%); } }
        @keyframes pulse { 0%, 100% { opacity: 1; } 50% { opacity: .5; } }
        @keyframes spin { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }

        [x-cloak] { display: none !important; }
    </style>
</head>

<body class="bg-[#030305] text-slate-200 antialiased overflow-x-hidden selection:bg-cyan-500/30"
      x-data="appData()" x-init="initIcons()">

    <div class="fixed inset-0 z-0 overflow-hidden pointer-events-none">
        <div class="absolute top-[-10%] left-[-10%] w-[500px] h-[500px] bg-purple-600/20 rounded-full blur-[120px] animate-pulse-slow mix-blend-screen"></div>
        <div class="absolute top-[20%] right-[-5%] w-[400px] h-[400px] bg-cyan-500/20 rounded-full blur-[100px] animate-float mix-blend-screen"></div>
        <div class="absolute bottom-[-10%] left-[20%] w-[600px] h-[600px] bg-blue-600/10 rounded-full blur-[120px] animate-pulse-slow mix-blend-screen"></div>
        <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20 mix-blend-overlay"></div>
    </div>

    <main class="relative z-10 min-h-screen flex flex-col">
        
        <div x-show="step === 'hero'" 
             x-transition:enter="transition ease-out duration-500"
             x-transition:enter-start="opacity-0 translate-y-10"
             x-transition:enter-end="opacity-100 translate-y-0"
             class="flex flex-col items-center justify-center min-h-screen px-6 py-20 text-center">
            
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/5 border border-white/10 mb-8">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                </span>
                <span class="text-xs font-medium text-gray-300 uppercase tracking-widest">Sistema V2.0 Online</span>
            </div>

            <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 tracking-tight leading-tight">
                O Futuro da <br />
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-purple-400 to-pink-400">
                    Inteligência Artificial
                </span>
            </h1>

            <p class="text-lg text-gray-400 max-w-2xl mb-8">
                Pare de pagar <span class="text-red-400 line-through decoration-red-400/50">R$ 4.000/mês</span> em ferramentas separadas.
                <br/>Desbloqueie o poder total por apenas <span class="text-green-400 font-bold">R$ 40/mês</span>.
            </p>

            <button @click="step = 'quiz'" 
                    class="group relative px-10 py-5 bg-white text-black font-bold text-xl rounded-full overflow-hidden transition-all hover:scale-105 hover:shadow-[0_0_40px_-10px_rgba(255,255,255,0.5)]">
                <div class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-cyan-400/30 to-transparent -translate-x-full group-hover:animate-shimmer"></div>
                <span class="relative flex items-center gap-2">
                    INICIAR ANÁLISE <i data-lucide="arrow-right" class="w-5 h-5"></i>
                </span>
            </button>

            <div class="mt-16 grid grid-cols-4 gap-6 opacity-50 grayscale hover:grayscale-0 transition-all duration-500">
               <div class="flex flex-col items-center"><div class="w-10 h-10 rounded-lg bg-green-500/20 mb-2"></div><span class="text-xs">GPT-5</span></div>
               <div class="flex flex-col items-center"><div class="w-10 h-10 rounded-lg bg-blue-500/20 mb-2"></div><span class="text-xs">Midjourney</span></div>
               <div class="flex flex-col items-center"><div class="w-10 h-10 rounded-lg bg-purple-500/20 mb-2"></div><span class="text-xs">Leonardo</span></div>
               <div class="flex flex-col items-center"><div class="w-10 h-10 rounded-lg bg-orange-500/20 mb-2"></div><span class="text-xs">Claude</span></div>
            </div>
        </div>

        <div x-show="step === 'quiz'" x-cloak
             class="flex flex-col items-center justify-center min-h-screen px-4 w-full max-w-2xl mx-auto">
            
            <div class="w-full mb-8 flex items-center gap-4">
                <span class="text-xs font-mono text-cyan-400" x-text="'0' + (currentQuizIndex + 1)"></span>
                <div class="h-1 flex-1 bg-white/10 rounded-full overflow-hidden">
                    <div class="h-full bg-gradient-to-r from-cyan-400 to-purple-500 transition-all duration-500"
                         :style="'width: ' + (((currentQuizIndex + 1) / totalQuestions) * 100) + '%'"></div>
                </div>
                <span class="text-xs font-mono text-gray-500" x-text="'0' + totalQuestions"></span>
            </div>

            <?php foreach ($questions as $index => $q): ?>
                <div x-show="currentQuizIndex === <?= $index ?>" 
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 translate-x-10"
                     x-transition:enter-end="opacity-100 translate-x-0"
                     class="w-full backdrop-blur-xl bg-white/5 border border-white/10 shadow-[0_8px_32px_0_rgba(0,0,0,0.36)] rounded-3xl p-8 md:p-12 relative overflow-hidden">
                    
                    <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-white/40 to-transparent opacity-50"></div>
                    
                    <h2 class="text-2xl md:text-3xl font-bold text-white mb-2 leading-snug"><?= $q['question'] ?></h2>
                    
                    <?php if ($q['subtext']): ?>
                        <p class="text-gray-400 text-sm mb-8"><?= $q['subtext'] ?></p>
                    <?php else: ?>
                        <div class="mb-8"></div>
                    <?php endif; ?>

                    <div class="space-y-3">
                        <?php foreach ($q['options'] as $opt): ?>
                            <button @click="handleAnswer('<?= $q['id'] ?>', '<?= isset($opt['value']) ? $opt['value'] : $opt['label'] ?>')"
                                    class="w-full text-left p-4 rounded-xl border border-white/5 bg-white/5 hover:bg-white/10 hover:border-cyan-500/50 hover:shadow-[0_0_20px_-5px_rgba(6,182,212,0.3)] transition-all duration-200 group flex items-center gap-4">
                                
                                <span class="text-2xl filter grayscale group-hover:grayscale-0 transition-all duration-300 scale-100 group-hover:scale-110">
                                    <?php if(isset($opt['icon'])): ?>
                                        <i data-lucide="<?= $opt['icon'] ?>" class="w-5 h-5"></i>
                                    <?php elseif(isset($opt['emoji'])): ?>
                                        <?= $opt['emoji'] ?>
                                    <?php endif; ?>
                                </span>
                                
                                <span class="text-gray-300 font-medium group-hover:text-white"><?= $opt['label'] ?></span>
                                
                                <div class="ml-auto opacity-0 group-hover:opacity-100 transition-opacity">
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
            <div class="backdrop-blur-xl bg-white/5 border border-red-500/30 shadow-2xl rounded-3xl p-10 max-w-md relative overflow-hidden">
                <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-white/40 to-transparent opacity-50"></div>
                
                <i data-lucide="alert-triangle" class="w-12 h-12 text-red-500 mx-auto mb-6"></i>
                <h2 class="text-2xl font-bold text-white mb-4">Acesso Restrito</h2>
                <p class="text-gray-400 mb-8">
                    Detectamos que você está sem computador. A Nucleo IA é uma ferramenta profissional que exige Windows ou Mac.
                </p>
                <button @click="step = 'hero'; currentQuizIndex = 0;" 
                        class="px-6 py-2 bg-white/10 hover:bg-white/20 rounded-lg text-white text-sm transition-colors">
                    Voltar ao Início
                </button>
            </div>
        </div>

        <div x-show="step === 'processing'" x-cloak
             class="flex flex-col items-center justify-center min-h-screen px-6">
            <div class="w-24 h-24 mb-8 relative">
                 <div class="absolute inset-0 border-2 border-white/10 rounded-full"></div>
                 <div class="absolute inset-0 border-2 border-t-cyan-500 border-r-transparent border-b-transparent border-l-transparent rounded-full animate-spin"></div>
                 <div class="absolute inset-0 m-auto flex items-center justify-center animate-pulse">
                    <i data-lucide="sparkles" class="w-8 h-8 text-purple-400"></i>
                 </div>
            </div>
            <h2 class="text-xl font-medium text-white mb-2 tracking-wide" x-text="processStatus"></h2>
            <div class="text-cyan-400 font-mono text-lg"><span x-text="processPercent"></span>%</div>
        </div>

        <div x-show="step === 'sales'" x-cloak
             class="min-h-screen py-20 px-4 overflow-y-auto w-full">
             
             <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-green-500/10 border border-green-500/30 text-green-400 text-sm font-bold mb-6">
                    <i data-lucide="check-circle-2" class="w-4 h-4"></i>
                    <span>PERFIL APROVADO</span>
                </div>
                <h1 class="text-4xl md:text-6xl font-bold text-white mb-6">
                    Seu Plano <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-purple-400">Núcleo IA</span>
                </h1>
                <p class="text-gray-400 max-w-xl mx-auto">
                    Desbloqueie acesso imediato às 50+ IAs mais poderosas do mercado por uma fração do preço.
                </p>
             </div>

             <div class="relative backdrop-blur-xl bg-yellow-500/5 border border-yellow-500/20 shadow-2xl rounded-3xl max-w-3xl mx-auto mb-16 p-8 overflow-hidden">
                <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-yellow-500/40 to-transparent opacity-50"></div>
                
                <div class="flex flex-col items-center text-center">
                    <i data-lucide="gem" class="w-10 h-10 text-yellow-400 mb-4"></i>
                    <h2 class="text-2xl font-bold text-white mb-2">Missão: Mensalidade Zero</h2>
                    <p class="text-gray-400 text-sm mb-8">Indique amigos e zere seu custo. O sistema paga você.</p>
                    
                    <div class="w-full grid grid-cols-3 gap-4">
                        <div class="p-4 rounded-xl bg-white/5 border border-white/10">
                            <div class="text-xs text-gray-500 uppercase mb-1">Meta 1</div>
                            <div class="text-white font-bold">R$ 0</div>
                            <div class="text-[10px] text-gray-400">2 Amigos</div>
                        </div>
                        <div class="p-4 rounded-xl bg-gradient-to-br from-yellow-500/20 to-orange-500/20 border border-yellow-500/50 relative overflow-hidden">
                             <div class="absolute top-0 left-0 w-full h-1 bg-yellow-500"></div>
                             <div class="text-xs text-yellow-400 uppercase mb-1 font-bold">Meta 2</div>
                             <div class="text-white font-bold">+R$ 60</div>
                             <div class="text-[10px] text-gray-300">5 Amigos</div>
                        </div>
                        <div class="p-4 rounded-xl bg-white/5 border border-white/10">
                             <div class="text-xs text-gray-500 uppercase mb-1">Meta 3</div>
                             <div class="text-white font-bold">+R$ 160</div>
                             <div class="text-[10px] text-gray-400">10 Amigos</div>
                        </div>
                    </div>
                </div>
             </div>

             <div class="flex justify-center mb-12">
                <div class="flex items-center gap-3 px-6 py-3 rounded-full bg-black/40 border border-white/10 backdrop-blur-md">
                    <i data-lucide="timer" class="w-4 h-4 text-red-400 animate-pulse"></i>
                    <span class="text-gray-300 font-mono text-lg" x-text="formatTime(timeLeft)"></span>
                    <span class="text-xs text-gray-500 uppercase tracking-wider">para expirar</span>
                </div>
             </div>

             <div class="max-w-6xl mx-auto grid md:grid-cols-3 gap-8 px-2">
                <?php foreach ($plans as $plan): ?>
                    <div class="relative transition-all duration-300" 
                         :class="<?= $plan['highlight'] ? "'scale-105 z-10'" : "'scale-100 opacity-90 hover:opacity-100'" ?>">
                        
                        <?php if ($plan['highlight']): ?>
                        <div class="absolute -top-10 left-0 right-0 flex justify-center">
                             <div class="bg-gradient-to-r from-cyan-500 to-blue-500 text-black font-bold text-xs px-4 py-1.5 rounded-full shadow-lg flex items-center gap-1">
                                <i data-lucide="star" class="w-3 h-3 fill-black"></i> RECOMENDADO
                             </div>
                        </div>
                        <?php endif; ?>

                        <div class="backdrop-blur-xl bg-white/5 border shadow-[0_8px_32px_0_rgba(0,0,0,0.36)] rounded-3xl overflow-hidden h-full p-8 flex flex-col
                                    <?= $plan['highlight'] ? 'border-cyan-500/30 bg-cyan-500/5' : 'border-white/10' ?>">
                             
                             <div class="mb-4">
                                <span class="text-xs font-bold uppercase tracking-widest <?= $plan['highlight'] ? 'text-cyan-400' : 'text-gray-400' ?>">
                                    <?= $plan['name'] ?>
                                </span>
                             </div>

                             <div class="text-gray-500 line-through text-sm">De <?= $plan['oldPrice'] ?></div>
                             <div class="flex items-baseline gap-1 mb-2">
                                <span class="text-4xl font-bold text-white"><?= $plan['price'] ?></span>
                                <span class="text-gray-400 text-sm"><?= $plan['period'] ?></span>
                             </div>

                             <?php if ($plan['installment']): ?>
                                <div class="text-cyan-400 text-sm font-bold mb-8 bg-cyan-900/20 inline-block px-2 py-1 rounded w-max"><?= $plan['installment'] ?></div>
                             <?php else: ?>
                                <div class="mb-8 h-7"></div>
                             <?php endif; ?>

                             <div class="space-y-4 mb-8 flex-1">
                                <?php foreach ($plan['features'] as $feat): ?>
                                    <div class="flex items-start gap-3 text-sm text-gray-300">
                                        <i data-lucide="check" class="w-4 h-4 mt-0.5 <?= $plan['highlight'] ? 'text-cyan-400' : 'text-gray-500' ?>"></i>
                                        <?= $feat ?>
                                    </div>
                                <?php endforeach; ?>
                             </div>

                             <button class="w-full py-4 rounded-xl font-bold text-sm uppercase tracking-wide transition-all hover:scale-[1.02] hover:shadow-lg
                                            <?= $plan['highlight'] ? 'bg-white text-black hover:bg-cyan-50' : 'bg-white/10 text-white hover:bg-white/20' ?>">
                                Começar Agora
                             </button>
                        </div>
                    </div>
                <?php endforeach; ?>
             </div>

             <div class="text-center text-gray-600 text-xs mt-20 pb-10">
                &copy; 2025 Nucleo IA. Tecnologia Segura.
             </div>
        </div>

    </main>

    <script>
        function appData() {
            return {
                step: 'hero',
                currentQuizIndex: 0,
                totalQuestions: <?= count($questions) ?>,
                processStatus: "Estabelecendo conexão segura...",
                processPercent: 0,
                timeLeft: 742,

                initIcons() {
                    // Re-renderiza os ícones quando o componente carrega ou atualiza
                    this.$watch('step', () => setTimeout(() => lucide.createIcons(), 50));
                    lucide.createIcons();
                },

                handleAnswer(questionId, value) {
                    // Lógica Gatekeeper
                    if (questionId === 'gatekeeper' && (value === false || value === 'false' || value === 0)) {
                        this.step = 'block';
                        return;
                    }

                    // Avançar Quiz
                    if (this.currentQuizIndex < this.totalQuestions - 1) {
                        this.currentQuizIndex++;
                        // Força atualização dos ícones no próximo passo
                        setTimeout(() => lucide.createIcons(), 100);
                    } else {
                        this.startProcessing();
                    }
                },

                startProcessing() {
                    this.step = 'processing';
                    this.processPercent = 0;
                    
                    // Simula barra de progresso
                    let interval = setInterval(() => {
                        if (this.processPercent < 100) {
                            this.processPercent++;
                        } else {
                            clearInterval(interval);
                        }
                    }, 40);

                    // Simula textos de status
                    setTimeout(() => this.processStatus = "Mapeando perfil de uso...", 1500);
                    setTimeout(() => this.processStatus = "Calculando otimização de custos...", 2500);
                    setTimeout(() => this.processStatus = "Gerando oferta exclusiva...", 3500);
                    
                    // Finaliza
                    setTimeout(() => {
                        this.step = 'sales';
                        this.startTimer();
                    }, 4500);
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