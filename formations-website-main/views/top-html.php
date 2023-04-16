<!doctype html>
<html lang="fr" dir="ltr" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>%TITLE%</title>
    <link rel="stylesheet" href="../assets/css/general.css">
    <link rel="stylesheet" href="../../../assets/css/general.css">
    <script>
        window.addEventListener('load', () => {
            const themeToggles = document.querySelectorAll('.rBWjB');

            if (localStorage.getItem('theme') != null) {
                document.documentElement.setAttribute('data-theme',  localStorage.getItem('theme'));
            } else {
                localStorage.setItem('theme', 'dark')
                document.documentElement.setAttribute('data-theme',  localStorage.getItem('theme'));
            }

            themeToggles.forEach((toggle) => {
                if (localStorage.getItem('theme') === 'dark') {
                    toggle.checked = true;
                } else {
                    toggle.checked = false;
                }
            })

        })
    </script>
</head>
