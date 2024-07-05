<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/blocks/style.css" type="text/css">

    <title>Отзывы</title>
</head>
<body>
    <header>
        <div class="main">
            <h1>Отзывы о компаний</h1>
            <button type="button" id="entrance"><span>Вход</span></button>
        </div>
    </header>

    <div class="container aut" id="aut"> 
        <div class="popup-box"> 
            <h2 style="color: green;">Popup Form</h2> 
            <form class="form-container"> 
                <label class="form-label" 
                       for="name"> 
                  Username: 
                  </label> 
                <input class="form-input" type="text" 
                       placeholder="Enter Your Username" 
                       id="name" name="name" required> 
  
                <label class="form-label" for="email">Email:</label> 
                <input class="form-input"
                       type="email" 
                       placeholder="Enter Your Email"
                       id="email" 
                       name="email" required> 
  
                <button class="btn-submit" 
                        type="submit"> 
                  Submit 
                  </button> 
            </form> 
  
            <button class="btn-close-popup" id="close"> 
              Close 
              </button> 
        </div> 
    </div> 
    <form action="" method="post" class="aut hidden" id="aut">
        <input type="text">
    </form>

    <style> 
        .container { 
            display: none; 
            position: fixed; 
            top: 0; 
            left: 0; 
            width: 100%; 
            height: 100%; 
            background: rgba(0, 0, 0, 0.6); 
            justify-content: center; 
            align-items: center; 
            opacity: 0; 
            transition: opacity 0.3s ease; 
        } 
  
        .popup-box { 
            background: #fff; 
            padding: 24px; 
            border-radius: 12px; 
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.4); 
            width: 320px; 
            text-align: center; 
            opacity: 0; 
            transform: scale(0.8); 
            animation: fadeInUp 0.5s ease-out forwards; 
        } 
  
        .form-container { 
            display: flex; 
            flex-direction: column; 
        } 
  
        .form-label { 
            margin-bottom: 10px; 
            font-size: 16px; 
            color: #444; 
            text-align: left; 
        } 
  
        .form-input { 
            padding: 10px; 
            margin-bottom: 20px; 
            border: 1px solid #ccc; 
            border-radius: 8px; 
            font-size: 16px; 
            width: 100%; 
            box-sizing: border-box; 
        } 
  
        .btn-submit, 
        .btn-close-popup { 
            padding: 12px 24px; 
            border: none; 
            border-radius: 8px; 
            cursor: pointer; 
            transition: background-color 0.3s ease, color 0.3s ease; 
        } 
  
        .btn-submit { 
            background-color: green; 
            color: #fff; 
        } 
  
        .btn-close-popup { 
            margin-top: 12px; 
            background-color: #e74c3c; 
            color: #fff; 
        } 
  
        .btn-submit:hover, 
        .btn-close-popup:hover { 
            background-color: #4caf50; 
        } 
  
        /* Keyframes for fadeInUp animation */ 
        @keyframes fadeInUp { 
            from { 
                opacity: 0; 
                transform: translateY(20px); 
            } 
  
            to { 
                opacity: 1; 
                transform: translateY(0); 
            } 
        } 
  
        /* Animation for popup */ 
        .container.show { 
            display: flex; 
            opacity: 1; 
        } 
    </style> 
