<div class="w-1/3 bg-white rounded-2xl shadow-2xl p-8">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-orange-600 mb-2">MAXITSA</h1>
            <p class="text-green-500 font-medium">Bienvenu sur MAXITSA</p>
        </div>

        <?php if (isset($success['message'])): ?>
                            <h2 class="font-bold text-center text-green-500"><?= $success['message'] ?> </h2>
                        <?php endif; ?>
        <!-- Form -->
        <form class="space-y-6" action="<?php $url ?>valid_inscription" method="post">
            <div class="flex justify-between">

                <div>
                    <!-- Nom complet -->
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Nom complet
                    </label>
                    <input 
                        name="nom"
                        type="text" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors bg-gray-50"
                        placeholder="Votre nom complet"
                    >
                <?php if(isset($errors['nom'])): ?>
                    <p class="text-red-500 text-sm"><?= $errors['nom'] ?></p>
                <?php endif; ?>
                </div>
    
                <!-- Numéro de téléphone -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Numéro de téléphone
                    </label>
                    <input 
                        name="telephone"
                        type="tel" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors bg-gray-50"
                        placeholder="Votre numéro de téléphone"
                    >
                    <?php if(isset($errors['telephone'])): ?>
                        <p class="text-red-500 text-sm"><?= $errors['telephone'] ?></p>
                    <?php endif; ?>
                </div>
            </div>

            <div>

            </div>
            <div  class="flex gap-4 border justify-between" >

                <div class="w-full">
    
                    <!-- Numéro de carte d'identité -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Numéro de carte d'identité
                        </label>
                        <input 
                            name= "numero_identite"
                            type="text" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors bg-gray-50"
                            placeholder="N° carte d'identité"
                        >
                    <?php if(isset($errors['numero_identite'])): ?>
                        <p class="text-red-500 text-sm"><?= $errors['numero_identite'] ?></p>
                    <?php endif; ?>
                    </div>
        
                    <!-- Login -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Login
                        </label>
                        <input 
                            name= "login"
                            type="text" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors bg-gray-50"
                            placeholder="Votre login"
                        >
                        <?php if(isset($errors['login'])): ?>
                            <p class="text-red-500 text-sm"><?= $errors['login'] ?></p>
                        <?php endif; ?>
                    </div>
        
                    <!-- Mot de passe -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Mot de passe
                        </label>
                        <input 
                            name= "password"
                            type="password" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors bg-gray-50"
                            placeholder="Votre mot de passe"
                        >
                    <?php if(isset($errors['password'])): ?>
                        <p class="text-red-500 text-sm"><?= $errors['password'] ?></p>
                    <?php endif; ?>
                    </div>
                </div>
                
                <div>

                    <!-- Document upload section -->
                    <div class="w-full h-[205px] mt-7">
                        <div class="h-full border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-orange-400 transition-colors">
                            <div class="text-gray-500 text-sm mb-2">
                                Ajouter un document contenant le recto et le verso de votre pièce d'identité
                            </div>
                            <input 
                                name= "document"
                                type="file" 
                                class="text-orange-600 font-medium text-sm hover:text-orange-700 transition-colors"
                                >
                            <?php if(isset($errors['document'])): ?>
                                <p class="text-red-500 text-sm"><?= $errors['document'] ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>


            <!-- Submit Button -->
            <button 
                type="submit" 
                class="w-full bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold py-3 px-6 rounded-lg hover:from-orange-600 hover:to-orange-700 transform hover:scale-105 transition-all duration-200 shadow-lg hover:shadow-xl"
            >
                Enregistrer
            </button>
        </form>

        <!-- Footer -->
        <div class="mt-6 text-center">
            <p class="text-gray-500 text-sm">
                Déjà inscrit ? 
                <a href="/ " class="text-orange-600 hover:text-orange-700 font-medium">Se connecter</a>
            </p>
        </div>
    </div>