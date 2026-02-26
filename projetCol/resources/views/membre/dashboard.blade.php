<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - ColocationEasy</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .sidebar-link { transition: all 0.2s; }
        .sidebar-link:hover { background: rgba(255,255,255,0.08); }
        .sidebar-link.active { background: rgba(20,184,166,0.15); border-left: 3px solid #14b8a6; }
        .card-hover { transition: transform 0.2s, box-shadow 0.2s; }
        .card-hover:hover { transform: translateY(-2px); box-shadow: 0 10px 30px rgba(0,0,0,0.08); }
        .score-ring { transform: rotate(-90deg); transform-origin: 50% 50%; }
        @keyframes fadeUp { from { opacity:0; transform:translateY(16px); } to { opacity:1; transform:translateY(0); } }
        .fade-up { animation: fadeUp 0.5s ease both; }
        .fade-up:nth-child(2) { animation-delay: 0.1s; }
        .fade-up:nth-child(3) { animation-delay: 0.2s; }
        .fade-up:nth-child(4) { animation-delay: 0.3s; }
    </style>
</head>
<body class="bg-gray-50">

<div class="flex min-h-screen">

    {{-- ===== SIDEBAR ===== --}}
    <aside class="w-64 flex-shrink-0 flex flex-col sticky top-0 h-screen"
           style="background: linear-gradient(170deg, #0f2027 0%, #1a4a40 60%, #0d3330 100%);">

        {{-- Brand --}}
        <div class="px-6 py-6 border-b border-white/10">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl flex items-center justify-center flex-shrink-0"
                     style="background: linear-gradient(135deg, #14b8a6, #0d9488);">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                        <polyline stroke-linecap="round" stroke-linejoin="round" points="9,22 9,12 15,12 15,22"/>
                    </svg>
                </div>
                <span class="text-white font-bold text-lg">Colocation<span class="text-teal-400">Easy</span></span>
            </div>
        </div>

        {{-- Nav --}}
        <nav class="flex-1 px-3 py-5 space-y-1">
            <p class="px-3 mb-2 text-xs font-semibold uppercase tracking-widest text-white/25">Menu</p>

            {{-- Dashboard --}}
            <a href="{{ route('dashbordmembre') }}" class="sidebar-link active flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-semibold text-white">
                <span class="w-8 h-8 rounded-lg bg-teal-500/20 flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4 text-teal-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/>
                        <rect x="14" y="14" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/>
                    </svg>
                </span>
                Dashboard
                <span class="ml-auto w-1.5 h-1.5 rounded-full bg-teal-400"></span>
            </a>

            {{-- Colocation --}}
            <a href="#" class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-white/60 hover:text-white">
                <span class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                        <polyline stroke-linecap="round" stroke-linejoin="round" points="9,22 9,12 15,12 15,22"/>
                    </svg>
                </span>
                Colocation
            </a>

            {{-- Profil --}}
            <a href="#" class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-white/60 hover:text-white">
                <span class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                </span>
                Profil
            </a>
        </nav>

        {{-- User footer --}}
        <div class="px-3 py-4 border-t border-white/10">
            <div class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-white/5">
                <div class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-bold text-white flex-shrink-0"
                     style="background: linear-gradient(135deg, #14b8a6, #0d9488);">A</div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-semibold text-white truncate">Ali Benali</p>
                    <p class="text-xs text-white/40 truncate">ali@email.com</p>
                </div>
                <a href="{{ route('logout') }}" class="text-white/30 hover:text-white/70 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                </a>
            </div>
        </div>
    </aside>

    {{-- ===== MAIN CONTENT ===== --}}
    <main class="flex-1 p-6 overflow-auto">

        {{-- Header --}}
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Tableau de bord</h1>
                <p class="text-sm text-gray-400 mt-0.5">Bienvenue, {{ auth()->user()->name }} — voici votre résumé du mois</p>
            </div>
            <div class="flex items-center gap-2 text-sm text-gray-500 bg-white border border-gray-200 rounded-xl px-4 py-2 shadow-sm">
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
                </svg>
                Janvier 2025
            </div>
        </div>

        {{-- ===== STATS CARDS ===== --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-6">

            {{-- Dépense globale --}}
            <div class="fade-up bg-white rounded-2xl p-5 shadow-sm border border-gray-100 card-hover">
                <div class="flex items-center justify-between mb-4">
                    <span class="text-xs font-semibold text-gray-400 uppercase tracking-wide">Dépense globale</span>
                    <div class="w-9 h-9 rounded-xl bg-blue-50 flex items-center justify-center">
                        <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/>
                        </svg>
                    </div>
                </div>
                <p class="text-3xl font-bold text-gray-800">{{$ExpenseGlobale}}<span class="text-lg font-semibold text-gray-400">€</span></p>
                <div class="flex items-center gap-1.5 mt-2">

                    <span class="text-xs text-gray-400">de ce mois</span>
                </div>
            </div>





            {{-- Score de réputation --}}
            <div class="fade-up bg-white rounded-2xl p-5 shadow-sm border border-gray-100 card-hover">
                <div class="flex items-center justify-between mb-3">
                    <span class="text-xs font-semibold text-gray-400 uppercase tracking-wide">Score réputation</span>
                    <div class="w-9 h-9 rounded-xl bg-purple-50 flex items-center justify-center">
                        <svg class="w-4 h-4 text-purple-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <polygon points="12,2 15.09,8.26 22,9.27 17,14.14 18.18,21.02 12,17.77 5.82,21.02 7,14.14 2,9.27 8.91,8.26"/>
                        </svg>
                    </div>
                </div>
                <div class="flex items-center gap-4">


                    <div>
                        <p class="text-2xl font-bold text-gray-800">{{ $scoreReputation}}</p>

                    </div>
                </div>
            </div>
        </div>



        {{-- ===== TABLE DÉPENSES RÉCENTES ===== --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100">
            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
                <h2 class="text-sm font-bold text-gray-700">Dépenses récentes</h2>
                <a href="#" class="text-xs text-teal-500 font-semibold hover:underline">Voir tout →</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-gray-50 text-xs text-gray-400 font-semibold uppercase tracking-wide">
                              <th class="px-6 py-3 text-left">Payé par</th>
                            <th class="px-6 py-3 text-left">Catégorie</th>

                            <th class="px-6 py-3 text-left">Date</th>
                            <th class="px-6 py-3 text-right">Montant</th>
                            <th class="px-6 py-3 text-center">Colocation</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">

                        <tr class="hover:bg-gray-50 transition-colors">


                            <td class="px-6 py-4 text-gray-500">{{ $recentExpense->payer->name??'_'}}</td>
                            <td class="px-6 py-4 text-gray-500">{{ $recentExpense->category->name??'_'}}</td>
                            <td class="px-6 py-4 text-gray-400">{{ $recentExpense->date??'_'}}</td>
                            <td class="px-6 py-4 text-right font-bold text-gray-800">{{ $recentExpense->amount??'_'}}</td>

                            <td class="px-6 py-4 text-right font-bold text-gray-800">{{ $recentExpense->colocation->name??'_'}}</td>

                        </tr>



                    </tbody>
                </table>
            </div>
        </div>

    </main>
</div>

<script>
// Chart Dépenses (Line)
const ctx1 = document.getElementById('depensesChart').getContext('2d');
new Chart(ctx1, {
    type: 'line',
    data: {
        labels: ['Août', 'Sep', 'Oct', 'Nov', 'Déc', 'Jan'],
        datasets: [{
            label: 'Dépenses (€)',
            data: [1850, 2100, 1980, 2300, 2200, 2480],
            borderColor: '#14b8a6',
            backgroundColor: 'rgba(20,184,166,0.08)',
            borderWidth: 2.5,
            pointBackgroundColor: '#14b8a6',
            pointRadius: 4,
            pointHoverRadius: 6,
            fill: true,
            tension: 0.4
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: {
            y: {
                beginAtZero: false,
                grid: { color: 'rgba(0,0,0,0.04)' },
                ticks: { color: '#9ca3af', font: { size: 11 }, callback: v => v + ' €' }
            },
            x: {
                grid: { display: false },
                ticks: { color: '#9ca3af', font: { size: 11 } }
            }
        }
    }
});

// Chart Répartition (Doughnut)
const ctx2 = document.getElementById('repartitionChart').getContext('2d');
new Chart(ctx2, {
    type: 'doughnut',
    data: {
        labels: ['Loyer', 'Courses', 'Énergie', 'Autres'],
        datasets: [{
            data: [45, 28, 15, 12],
            backgroundColor: ['#2dd4bf', '#60a5fa', '#fbbf24', '#c084fc'],
            borderWidth: 0,
            hoverOffset: 6
        }]
    },
    options: {
        responsive: true,
        cutout: '70%',
        plugins: { legend: { display: false } }
    }
});
</script>

</body>
</html>
