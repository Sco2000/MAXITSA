<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Groupe</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'dark-green': '#1a2e1a',
                        'medium-green': '#2d4a2d',
                        'light-green': '#3d5a3d',
                        'accent-green': '#4ade80'
                    }
                }
            }
        }
    </script>
</head>
<body class="h-[100vh] border bg-[#FBF6EE] flex">
    <?php  require_once "../templates/layout/partial/header.html.php";?>
    <div class="w-full mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <?php  echo $containForLayout;?>
    </div>
</body>
</html>