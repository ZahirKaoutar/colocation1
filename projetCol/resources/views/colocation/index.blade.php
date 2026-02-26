<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Colocations - ColocationEasy</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 min-h-screen">

<div class="flex min-h-screen">

    {{-- ===== SIDEBAR ===== --}}
    <aside class="w-64 flex-shrink-0 flex flex-col sticky top-0 h-screen"
           style="background: linear-gradient(170deg, #0f2027 0%, #1a4a40 60%, #0d3330 100%);">

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

        <nav class="flex-1 px-3 py-5 space-y-1">
            <p class="px-3 mb-2 text-xs font-semibold uppercase tracking-widest text-white/25">Menu</p>

            <a href="{{ route('dashbordmembre') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-white/60 hover:text-white hover:bg-white/5 transition-all">
                <span class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/>
                        <rect x="14" y="14" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/>
                    </svg>
                </span>
                Dashboard
            </a>

            <a href="{{ route('colocations.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-semibold text-white transition-all"
               style="background: rgba(20,184,166,0.15); border-left: 3px solid #14b8a6;">
                <span class="w-8 h-8 rounded-lg bg-teal-500/20 flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4 text-teal-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                        <polyline stroke-linecap="round" stroke-linejoin="round" points="9,22 9,12 15,12 15,22"/>
                    </svg>
                </span>
                Colocation
                <span class="ml-auto w-1.5 h-1.5 rounded-full bg-teal-400"></span>
            </a>

            <a href=""
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-white/60 hover:text-white hover:bg-white/5 transition-all">
                <span class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                </span>
                Profil
            </a>
        </nav>

        <div class="px-3 py-4 border-t border-white/10">
            <div class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-white/5">
                <div class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-bold text-white flex-shrink-0"
                     style="background: linear-gradient(135deg, #14b8a6, #0d9488);">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-semibold text-white truncate">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-white/40 truncate">{{ Auth::user()->email }}</p>
                </div>
            </div>
        </div>
    </aside>

    {{-- ===== MAIN ===== --}}
    <main class="flex-1 p-8">

        {{-- Header --}}
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Mes Colocations</h1>
                <p class="text-sm text-gray-400 mt-0.5">
                    {{ $colocations->count() }} colocation{{ $colocations->count() > 1 ? 's' : '' }} trouvée{{ $colocations->count() > 1 ? 's' : '' }}
                </p>
            </div>
            <a href="{{ route('colocations.create') }}"
               class="flex items-center gap-2 px-5 py-2.5 text-white text-sm font-semibold rounded-xl transition-all hover:-translate-y-0.5 hover:shadow-lg"
               style="background: linear-gradient(135deg, #14b8a6, #0d9488); box-shadow: 0 4px 14px rgba(13,148,136,0.3);">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
                </svg>
                Nouvelle colocation
            </a>
        </div>

        {{-- Flash messages --}}
        @if (session('success'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 text-sm rounded-xl flex items-center gap-2">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10"/><polyline points="9,12 11,14 15,10"/>
                </svg>
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-600 text-sm rounded-xl flex items-center gap-2">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                </svg>
                {{ session('error') }}
            </div>
        @endif

        {{-- Empty state --}}
        @if ($colocations->isEmpty())
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-16 text-center">
                <div class="w-16 h-16 rounded-2xl bg-teal-50 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-teal-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                        <polyline stroke-linecap="round" stroke-linejoin="round" points="9,22 9,12 15,12 15,22"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-700 mb-1">Aucune colocation</h3>
                <p class="text-sm text-gray-400 mb-6">Vous n'avez pas encore de colocation. Créez-en une maintenant !</p>
                <a href="{{ route('colocations.create') }}"
                   class="inline-flex items-center gap-2 px-5 py-2.5 text-white text-sm font-semibold rounded-xl"
                   style="background: linear-gradient(135deg, #14b8a6, #0d9488);">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
                    </svg>
                    Créer ma première colocation
                </a>
            </div>

        {{-- Colocations table --}}
        @else
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100 text-xs text-gray-400 font-semibold uppercase tracking-wide">
                            <th class="px-6 py-4 text-left">#</th>
                            <th class="px-6 py-4 text-left">Nom de la colocation</th>
                            <th class="px-6 py-4 text-left">Propriétaire</th>
                            <th class="px-6 py-4 text-left">Statut</th>
                            <th class="px-6 py-4 text-left">Créée le</th>
                            <th class="px-6 py-4 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach ($colocations as $col)
                            <tr class="hover:bg-gray-50 transition-colors">

                                {{-- # --}}
                                <td class="px-6 py-4 text-gray-400 font-medium">{{ $loop->iteration }}</td>

                                {{-- Nom --}}
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-xl flex items-center justify-center flex-shrink-0"
                                             style="background: linear-gradient(135deg, #ccfbf1, #99f6e4);">
                                            <svg class="w-4 h-4 text-teal-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                                                <polyline stroke-linecap="round" stroke-linejoin="round" points="9,22 9,12 15,12 15,22"/>
                                            </svg>
                                        </div>
                                        <span class="font-semibold text-gray-800">{{ $col->name }}</span>
                                    </div>
                                </td>

                                {{-- Propriétaire --}}
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <div class="w-7 h-7 rounded-full flex items-center justify-center text-xs font-bold text-white flex-shrink-0"
                                             style="background: linear-gradient(135deg, #14b8a6, #0d9488);">
                                            {{ strtoupper(substr($col->owner->name ?? 'U', 0, 1)) }}
                                        </div>
                                        <span class="text-gray-600">{{ $col->owner->name ?? 'Inconnu' }}</span>
                                        @if ($col->owner_id === Auth::id())
                                            <span class="text-xs font-semibold text-teal-600 bg-teal-50 px-2 py-0.5 rounded-full">Moi</span>
                                        @endif
                                    </div>
                                </td>

                                {{-- Statut --}}
                                <td class="px-6 py-4">
                                    @if ($col->status === 'active')
                                        <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-green-600 bg-green-50 px-2.5 py-1 rounded-full">
                                            <span class="w-1.5 h-1.5 rounded-full bg-green-500 inline-block"></span>
                                            Active
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-gray-400 bg-gray-100 px-2.5 py-1 rounded-full">
                                            <span class="w-1.5 h-1.5 rounded-full bg-gray-400 inline-block"></span>
                                            Inactive
                                        </span>
                                    @endif
                                </td>

                                {{-- Date --}}
                                <td class="px-6 py-4 text-gray-400">
                                    {{ $col->created_at->format('d M Y') }}
                                </td>

                                {{-- Actions --}}
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center gap-2">

                                        {{-- Voir --}}
                                        <a href="{{ route('colocations.show', $col->id) }}"
                                           class="w-8 h-8 rounded-lg bg-blue-50 hover:bg-blue-100 flex items-center justify-center transition-colors"
                                           title="Voir">
                                            <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                                <circle cx="12" cy="12" r="3"/>
                                            </svg>
                                        </a>

                                        {{-- Modifier (owner seulement) --}}
                                        @if ($col->owner_id === Auth::id())
                                            <a href="{{ route('colocations.edit',$col->id) }}"
                                               class="w-8 h-8 rounded-lg bg-amber-50 hover:bg-amber-100 flex items-center justify-center transition-colors"
                                               title="Modifier">
                                                <svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/>
                                                    <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                                </svg>
                                            </a>

                                            {{-- Supprimer --}}
                                            <form method="POST" action="{{ route('colocations.destroy',$col->id) }}"
                                                  onsubmit="return confirm('Supprimer cette colocation ?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="w-8 h-8 rounded-lg bg-red-50 hover:bg-red-100 flex items-center justify-center transition-colors"
                                                        title="Supprimer">
                                                    <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                        <polyline points="3,6 5,6 21,6"/>
                                                        <path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/>
                                                        <path d="M10 11v6M14 11v6"/>
                                                        <path d="M9 6V4a1 1 0 011-1h4a1 1 0 011 1v2"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        @endif

                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

    </main>
</div>

</body>
</html>
