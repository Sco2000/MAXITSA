<div class="w-full max-w-md bg-white rounded-2xl shadow-2xl p-8">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-orange-600 mb-2">MAXITSA</h1>
            <p class="text-green-500 font-medium">Bienvenu sur MAXITSA</p>
        </div>

        <!-- Form -->
        <form class="space-y-6" method="post" action="<?php $url ?>login">
            <!-- Login -->
            <div>
                <label for="login" class="block text-sm font-medium text-green-600 mb-2 uppercase">
                    LOGIN
                </label>
                <input 
                    name="login"
                    type="text" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors bg-gray-50"
                    placeholder="Votre login"
                >
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-green-600 mb-2 uppercase">
                    PASSWORD
                </label>
                <input 
                    name="password"
                    type="password" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors bg-gray-50"
                    placeholder="Votre mot de passe"
                >
            </div>

            <!-- Submit Button -->
            <button 
                type="submit" 
                class="w-full bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold py-3 px-6 rounded-lg hover:from-orange-600 hover:to-orange-700 transform hover:scale-105 transition-all duration-200 shadow-lg hover:shadow-xl"
            >
                Se Connecter
            </button>
        </form>

        <!-- Footer -->
        <div class="mt-6 text-center">
            <p class="text-gray-600 text-sm">
                Pas de compte? 
                <a href="<?php $url ?>inscription" class="text-orange-600 hover:text-orange-700 font-medium">Créer un compte</a>
            </p>
        </div>
    </div>