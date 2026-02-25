<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
<div class="min-h-screen bg-gray-100 flex items-center justify-center p-4">
    <div class="max-w-md w-full bg-white rounded-xl shadow-lg p-8">
        <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Connexion à EasyColoc</h2>

        <form action="{{ route('loginSubmit') }}" method="POST">
            @csrf
            <div class="space-y-4">
                <div>

                    <label class="block text-sm font-medium text-gray-700">Email</label>

                    <input type="email" name="email" required class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <p>@error('email')
                        {{ $message }}

                    @enderror</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Mot de passe</label>
                    <input type="password" name="password" required
                           class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">

                    <p>@error('password')
                        {{ $message }}

                    @enderror</p>
                </div>

                <button type="submit"
                        class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                    Se connecter
                </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
