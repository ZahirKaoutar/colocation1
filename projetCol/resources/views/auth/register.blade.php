<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EasyColoc - Inscription</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
<div class="min-h-screen bg-blue-50 flex items-center justify-center p-4">
    <div class="max-w-md w-full bg-white rounded-2xl shadow-xl p-8 border-t-8 border-blue-600">
        <h2 class="text-3xl font-extrabold text-blue-600 text-center mb-2">EasyColoc</h2>
        <p class="text-gray-500 text-center mb-6">Créez votre compte membre</p>



        <form action="{{ route('registerSubmit') }}" method="POST">
            @csrf
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-600">Nom Complet</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                           class="w-full mt-1 px-4 py-2 bg-gray-50 border border-gray-200 rounded-md
                                  focus:bg-white focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    @error('name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-600">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                           class="w-full mt-1 px-4 py-2 bg-gray-50 border border-gray-200 rounded-md
                                  focus:bg-white focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    @error('email')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-600">Mot de passe</label>
                        <input type="password" name="password" required
                               class="w-full mt-1 px-4 py-2 bg-gray-50 border border-gray-200 rounded-md
                                      focus:ring-2 focus:ring-blue-400">
                        @error('password')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                </div>

                <button type="submit"
                        class="w-full mt-4 bg-gradient-to-r from-blue-600 to-blue-500 text-white font-bold py-3 rounded-lg shadow-md hover:shadow-lg transition">
                    S'inscrire
                </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
