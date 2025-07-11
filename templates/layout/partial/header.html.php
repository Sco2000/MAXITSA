<div class="w-64 bg-orange-500 text-white flex flex-col justify-between">
            <!-- Logo -->
            <div class="p-6">
                <div class="bg-white text-orange-500 font-bold text-xl px-4 py-2 rounded-lg">
                    MAXITSA
                </div>
            </div>
            
            <!-- Menu Items -->
            <nav class="px-4 space-y-2">
                <div class="flex items-center space-x-3 p-3 rounded-lg bg-green-600">
                    <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center">
                        <span class="text-green-600 font-bold text-sm">↔</span>
                    </div>
                    <span class="font-medium">Transactions</span>
                </div>
                
                <div class="flex items-center space-x-3 p-3 rounded-lg hover:bg-orange-600 transition-colors">
                    <div class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center">
                        <span class="text-white font-bold text-sm">👤</span>
                    </div>
                    <span class="font-medium">Mes comptes</span>
                </div>
                
                <div class="flex items-center space-x-3 p-3 rounded-lg bg-green-600 hover:bg-green-700 transition-colors">
                    <span class="font-medium">Ajouter un compte</span>
                </div>
            </nav>
            <div>
                <a href="<?php $url ?>logout"><button class="bg-[#54d12b] hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">Se déconnecter</button></a>
            </div>
</div>