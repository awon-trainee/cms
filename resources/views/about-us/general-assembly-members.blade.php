@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            margin: 40px auto;
            width: 90%;
            max-width: 1200px;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .text-center {
            text-align: center;
        }

        .member-card {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin: 10px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 200px;
        }

        .member-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .member-info {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .social-icons a {
            text-decoration: none;
            color: #007bff;
        }

        .social-icons a:hover {
            text-decoration: underline;
        }

        .member-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .icon {
            width: 20px;
            height: 20px;
            display: inline-block;
            background-size: cover;
        }

        .icon-facebook {
            background-image: url('https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg');
        }

        .icon-twitter {
            background-image: url('https://upload.wikimedia.org/wikipedia/en/6/60/Twitter_Logo_as_of_2021.svg');
        }

        .icon-instagram {
            background-image: url('https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png');
        }

        .icon-youtube {
            background-image: url('https://www.flaticon.com/free-icon/youtube_174883');
        }

        .icon-telegram {
            background-image: url('https://upload.wikimedia.org/wikipedia/commons/8/82/Telegram_logo.svg');
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">أعضاء الجمعية العمومية</h2>
        <div class="member-grid" id="members-grid">
            <!-- Member cards will be inserted here by JavaScript -->
        </div>
    </div>
    
    
    <script>
        const members = [
            {
                name: 'جهاد',
                picture_url: 'https://saudiscoop.com/wp-content/uploads/2021/04/alinma-768x511.jpg',
                position: 'عضو مجلس إدارة',
                social: {
                    facebook: '',
                    instagram: 'https://www.instagram.com/jode_kb?igsh=MW9xcHdmd29jd2k0ZQ%3D%3D&utm_source=qr',
                    telegram: 'https://t.me/jode_kb'
                }
            },
            {
                name: 'نزار',
                picture_url: 'https://saudiscoop.com/wp-content/uploads/2021/04/alinma-768x511.jpg',
                position: 'نائب رئيس مجلس الإدارة',
                social: {
                    facebook: 'https://www.facebook.com/profile.php?id=100023069972706&mibextid=JRoKGi',
                    instagram: 'https://www.instagram.com/nizoo.9?igsh=c3I4amRndzV4Znd5&utm_source=qr',
                    telegram: 'https://t.me/Nizar_022'
                }
            }
            // Add more members as needed
        ];

        const membersGrid = document.getElementById('members-grid');

        members.forEach(member => {
            const memberCard = document.createElement('div');
            memberCard.classList.add('member-card');

            memberCard.innerHTML = `
                <img src="${member.picture_url}" alt="${member.name}" class="member-avatar">
                <div class="member-info">
                    <h4>${member.name}</h4>
                    <p>${member.position}</p>
                </div>
                <div class="social-icons">
                    <a href="${member.social.facebook}" target="_blank"><span class="icon icon-facebook"></span></a>
                    <a href="${member.social.twitter}" target="_blank"><span class="icon icon-twitter"></span></a>
                    <a href="${member.social.instagram}" target="_blank"><span class="icon icon-instagram"></span></a>
                    <a href="${member.social.youtube}" target="_blank"><span class="icon icon-youtube"></span></a>
                    <a href="${member.social.telegram}" target="_blank"><span class="icon icon-telegram"></span></a>
                </div>
            `;

            membersGrid.appendChild(memberCard);
        });
    </script>
</body>
</html>
