<div class="w-full flex-1 flex flex-col p-2">
            <!-- Header -->
            <div class="shadow-sm p-6 flex items-center justify-between">
                <div class="flex items-center space-x-6">
                    <div class="p-2 border bg-gray-300 rounded full">
                        <?php if (isset($compteArray['solde'])): ?>
                            <h2 class="text-2xl font-bold text-gray-800">SOLDE: <?= $compteArray['solde'] ?> FCFA</h2>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-2">
                        <select class="bg-gray-300  border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                            <option>Filtrer par type de transaction</option>
                            <option>Dépôt</option>
                            <option>Retrait</option>
                        </select>
                    </div>
                    
                    <div class="bg-gray-300 rounded full items-center space-x-2">
                        <button class="border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 flex items-center space-x-2">
                            <span>Sélectionner une date</span>
                            <span>📅</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Content Area -->
            <table class="w-full bg-white">
                <thead>
                    <tr>
                        <th class="bg-orange-500 text-white p-3 text-center font-medium">Date</th>
                        <th class="bg-orange-500 text-white p-3 text-center font-medium">Type</th>
                        <th class="bg-orange-500 text-white p-3 text-center font-medium">Montant</th>
                    </tr>
                </thead>
                <tbody class="rounded-full">
                    <tr class="border border-gray-200 ">
                        <td class="p-3 text-center">
                            <div class="font-medium">09/07/2025</div>
                            <div class="text-sm text-gray-600">22:55</div>
                        </td>
                        <td class="p-3 text-center">
                            <span class="text-green-600 font-medium">Dépôt</span>
                        </td>
                        <td class="p-3 text-center font-medium">100</td>
                    </tr>
                    <tr class="border-b border-gray-200">
                        <td class="p-3 text-center">
                            <div class="font-medium">09/07/2025</div>
                            <div class="text-sm text-gray-600">22:55</div>
                        </td>
                        <td class="p-3 text-center">
                            <span class="text-green-600 font-medium">Dépôt</span>
                        </td>
                        <td class="p-3 text-center font-medium">75</td>
                    </tr>
                    <tr class="border-b border-gray-200">
                        <td class="p-3 text-center">
                            <div class="font-medium">09/07/2025</div>
                            <div class="text-sm text-gray-600">22:55</div>
                        </td>
                        <td class="p-3 text-center">
                            <span class="text-green-600 font-medium">Dépôt</span>
                        </td>
                        <td class="p-3 text-center font-medium">250</td>
                    </tr>
                    <tr class="border-b border-gray-200">
                        <td class="p-3 text-center">
                            <div class="font-medium">09/07/2025</div>
                            <div class="text-sm text-gray-600">22:55</div>
                        </td>
                        <td class="p-3 text-center">
                            <span class="text-green-600 font-medium">Dépôt</span>
                        </td>
                        <td class="p-3 text-center font-medium">100</td>
                    </tr>
                    <tr class="border-b border-gray-200">
                        <td class="p-3 text-center">
                            <div class="font-medium">09/07/2025</div>
                            <div class="text-sm text-gray-600">22:55</div>
                        </td>
                        <td class="p-3 text-center">
                            <span class="text-green-600 font-medium">Dépôt</span>
                        </td>
                        <td class="p-3 text-center font-medium">364</td>
                    </tr>
                    <tr class="border-b border-gray-200">
                        <td class="p-3 text-center">
                            <div class="font-medium">09/07/2025</div>
                            <div class="text-sm text-gray-600">22:55</div>
                        </td>
                        <td class="p-3 text-center">
                            <span class="text-green-600 font-medium">Dépôt</span>
                        </td>
                        <td class="p-3 text-center font-medium">364</td>
                    </tr>
                    <tr class="border-b border-gray-200">
                        <td class="p-3 text-center">
                            <div class="font-medium">09/07/2025</div>
                            <div class="text-sm text-gray-600">22:55</div>
                        </td>
                        <td class="p-3 text-center">
                            <span class="text-green-600 font-medium">Dépôt</span>
                        </td>
                        <td class="p-3 text-center font-medium">364</td>
                    </tr>
                    <tr class="border-b border-gray-200">
                        <td class="p-3 text-center">
                            <div class="font-medium">09/07/2025</div>
                            <div class="text-sm text-gray-600">22:55</div>
                        </td>
                        <td class="p-3 text-center">
                            <span class="text-green-600 font-medium">Dépôt</span>
                        </td>
                        <td class="p-3 text-center font-medium">364</td>
                    </tr>
                    <tr class="border-b-2 border-purple-400">
                        <td class="p-3 text-center">
                            <div class="font-medium">09/07/2025</div>
                            <div class="text-sm text-gray-600">22:55</div>
                        </td>
                        <td class="p-3 text-center">
                            <span class="text-green-600 font-medium">Dépôt</span>
                        </td>
                        <td class="p-3 text-center font-medium">364</td>
                    </tr>
                    <tr>
                        <td class="p-3 text-center">
                            <div class="font-medium">09/07/2025</div>
                            <div class="text-sm text-gray-600">22:55</div>
                        </td>
                        <td class="p-3 text-center">
                            <span class="text-green-600 font-medium">Dépôt</span>
                        </td>
                        <td class="p-3 text-center font-medium">364</td>
                    </tr>
                </tbody>
            </table>

                <!-- Pagination -->
                <div class="flex justify-center items-center space-x-2 mt-6">
                    <button class="w-8 h-8 flex items-center justify-center rounded border border-gray-300 hover:bg-gray-100">
                        ‹
                    </button>
                    <button class="w-8 h-8 flex items-center justify-center rounded bg-green-600 text-white">
                        1
                    </button>
                    <button class="w-8 h-8 flex items-center justify-center rounded border border-gray-300 hover:bg-gray-100">
                        2
                    </button>
                    <button class="w-8 h-8 flex items-center justify-center rounded border border-gray-300 hover:bg-gray-100">
                        3
                    </button>
                    <button class="w-8 h-8 flex items-center justify-center rounded border border-gray-300 hover:bg-gray-100">
                        ›
                    </button>
                </div>
    </div>