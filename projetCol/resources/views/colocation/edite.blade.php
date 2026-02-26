<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier la colocation - ColocationEasy</title>
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
        <div class="flex items-center gap-3 mb-8">
            <a href="{{ route('colocations.index') }}"
               class="w-9 h-9 rounded-xl bg-white border border-gray-200 flex items-center justify-center shadow-sm hover:bg-gray-50 transition-colors">
                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <polyline points="15,18 9,12 15,6"/>
                </svg>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Modifier la colocation</h1>
                <p class="text-sm text-gray-400 mt-0.5">Modifiez les informations de <span class="font-semibold text-gray-600">{{ $colocation->name }}</span></p>
            </div>
        </div>

        {{-- Form Card --}}
        <div class="max-w-xl bg-white rounded-2xl shadow-sm border border-gray-100 p-8">

            <form method="POST" action="{{ route('colocations.update', $colocation->id) }}" class="space-y-6">
                @csrf
                @method('PUT')

                {{-- Nom de la colocation --}}
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-1.5">
                        Nom de la colocation
                        <span class="text-red-400">*</span>
                    </label>
                    <input
                        id="name"
                        type="text"
                        name="name"
                        value="{{ old('name', $colocation->name) }}"
                        required
                        placeholder="Ex: Appart Belleville, Coloc Paris 11..."
                        class="w-full px-4 py-2.5 border rounded-xl text-sm text-gray-700 placeholder-gray-300
                               focus:outline-none focus:ring-2 focus:ring-teal-400 focus:border-transparent transition-all
                               {{ $errors->has('name') ? 'border-red-400 bg-red-50' : 'border-gray-200 bg-gray-50' }}">
                    @error('name')
                        <p class="mt-1.5 text-xs text-red-500 flex items-center gap-1">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Propriétaire (disabled) --}}
                <div>
                    <label for="owner" class="block text-sm font-semibold text-gray-700 mb-1.5">
                        Propriétaire
                    </label>
                    <div class="relative">
                        <span class="absolute left-3.5 top-1/2 -translate-y-1/2">
                            <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/>
                                <circle cx="12" cy="7" r="4"/>
                            </svg>
                        </span>
                        <input
                            id="owner"
                            type="text"
                            value="{{ Auth::user()->name }}"
                            disabled
                            class="w-full pl-10 pr-4 py-2.5 border border-gray-200 rounded-xl text-sm text-gray-400 bg-gray-50 cursor-not-allowed">
                        <input type="hidden" name="owner_id" value="{{ Auth::user()->id }}">
                    </div>
                    <p class="mt-1.5 text-xs text-gray-400">Le propriétaire ne peut pas être modifié.</p>
                </div>

                {{-- Statut actuel --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Statut actuel</label>
                    <div class="flex items-center gap-2 px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl">
                        @if ($colocation->status === 'active')
                            <span class="w-2 h-2 rounded-full bg-green-500 inline-block"></span>
                            <span class="text-sm text-green-600 font-semibold">Active</span>
                        @else
                            <span class="w-2 h-2 rounded-full bg-gray-400 inline-block"></span>
                            <span class="text-sm text-gray-400 font-semibold">Inactive</span>
                        @endif
                        <span class="ml-auto text-xs text-gray-400">Créée le {{ $colocation->created_at->format('d M Y') }}</span>
                    </div>
                </div>

                {{-- Buttons --}}
                <div class="flex items-center gap-3 pt-2">
                    <button type="submit"
                            class="px-6 py-2.5 text-white text-sm font-semibold rounded-xl transition-all hover:-translate-y-0.5 hover:shadow-lg active:translate-y-0"
                            style="background: linear-gradient(135deg, #14b8a6, #0d9488); box-shadow: 0 4px 14px rgba(13,148,136,0.3);">
                        Enregistrer les modifications
                    </button>
                    <a href="{{ route('colocations.index') }}"
                       class="px-6 py-2.5 text-sm font-semibold text-gray-500 bg-gray-100 hover:bg-gray-200 rounded-xl transition-colors">
                        Annuler
                    </a>
                </div>

            </form>
        </div>

    </main>
</div>

</body>
</html>
