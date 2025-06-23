<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auguu Mzumbe Downloader</title>
    <style>
        /* External CSS with background image */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                url('https://images.unsplash.com/photo-1611162617213-7d7a39e9b1d7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2000&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #fff;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        header {
            text-align: center;
            padding: 30px 0;
            margin-bottom: 30px;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            color: #ff6b6b;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
        }

        .tagline {
            font-size: 1.2rem;
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto;
        }

        .card {
            background: rgba(30, 30, 40, 0.85);
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .card-title {
            font-size: 1.5rem;
            margin-bottom: 20px;
            color: #4ecdc4;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-title i {
            font-size: 1.8rem;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }

        input[type="url"],
        select {
            width: 100%;
            padding: 12px 15px;
            border-radius: 8px;
            border: none;
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            font-size: 1rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        input[type="url"]:focus,
        select:focus {
            outline: none;
            border-color: #4ecdc4;
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 0 0 3px rgba(78, 205, 196, 0.2);
        }

        input[type="url"]::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .btn {
            display: inline-block;
            background: linear-gradient(45deg, #ff6b6b, #ff8e53);
            color: white;
            border: none;
            padding: 12px 30px;
            font-size: 1.1rem;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 4px 15px rgba(255, 107, 107, 0.3);
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(255, 107, 107, 0.4);
        }

        .btn:active {
            transform: translateY(1px);
        }

        .btn-download {
            background: linear-gradient(45deg, #4ecdc4, #2a9d8f);
            box-shadow: 0 4px 15px rgba(78, 205, 196, 0.3);
        }

        .btn-download:hover {
            box-shadow: 0 6px 20px rgba(78, 205, 196, 0.4);
        }

        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 40px;
        }

        .feature {
            background: rgba(40, 40, 60, 0.7);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .feature:hover {
            transform: translateY(-5px);
        }

        .feature i {
            font-size: 2.5rem;
            color: #ffb347;
            margin-bottom: 15px;
        }

        .feature h3 {
            margin-bottom: 10px;
            color: #ffb347;
        }

        .instructions {
            margin-top: 40px;
            padding: 25px;
            background: rgba(30, 30, 40, 0.85);
            border-radius: 15px;
        }

        .instructions h2 {
            color: #ffb347;
            margin-bottom: 20px;
            text-align: center;
        }

        .steps {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            gap: 20px;
        }

        .step {
            flex: 1;
            min-width: 200px;
            text-align: center;
            padding: 20px;
        }

        .step-number {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: #ff6b6b;
            color: white;
            border-radius: 50%;
            font-weight: bold;
            margin-bottom: 15px;
        }

        footer {
            text-align: center;
            padding: 30px 0;
            margin-top: 40px;
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        @media (max-width: 600px) {
            .container {
                padding: 10px;
            }

            .card {
                padding: 20px;
            }

            h1 {
                font-size: 2rem;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="container">
        <header>
            <h1><i class="fas fa-download"></i> AUGUU Media Downloader</h1>
            <p class="tagline">Download YouTube videos and audio in high quality with our fast and secure service</p>
        </header>

        <main>
            <div class="card">
                <h2 class="card-title"><i class="fas fa-cloud-download-alt"></i> Download YouTube Media</h2>
                <form action="download.php" method="post">
                    <div class="form-group">
                        <label for="url">YouTube Video URL:</label>
                        <input type="url" id="url" name="url" placeholder="Enter YouTube URL" required>
                    </div>

                    <div class="form-group">
                        <label for="format">Select Format:</label>
                        <select id="format" name="format">
                            <option value="video">Video (MP4)</option>
                            <option value="audio">Audio (MP3)</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-download">
                        <i class="fas fa-download"></i> Download Now
                    </button>
                </form>
            </div>

            <div class="card">
                <h2 class="card-title"><i class="fas fa-upload"></i> Photo Upload</h2>
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="photo">Select Photo:</label>
                        <input type="file" id="photo" name="photo" required>
                    </div>

                    <button type="submit" class="btn">
                        <i class="fas fa-cloud-upload-alt"></i> Upload Photo
                    </button>
                </form>
            </div>

            <div class="features">
                <div class="feature">
                    <i class="fas fa-bolt"></i>
                    <h3>Fast Downloads</h3>
                    <p>High-speed downloads with our optimized servers</p>
                </div>

                <div class="feature">
                    <i class="fas fa-lock"></i>
                    <h3>Secure Service</h3>
                    <p>Your privacy is our top priority</p>
                </div>

                <div class="feature">
                    <i class="fas fa-highlighter"></i>
                    <h3>High Quality</h3>
                    <p>Download videos in up to 4K resolution</p>
                </div>
            </div>

            <div class="instructions">
                <h2>How to Download</h2>
                <div class="steps">
                    <div class="step">
                        <div class="step-number">1</div>
                        <h3>Copy URL</h3>
                        <p>Copy YouTube video URL from your browser</p>
                    </div>

                    <div class="step">
                        <div class="step-number">2</div>
                        <h3>Paste URL</h3>
                        <p>Paste the URL in the download form</p>
                    </div>

                    <div class="step">
                        <div class="step-number">3</div>
                        <h3>Choose Format</h3>
                        <p>Select video or audio format</p>
                    </div>

                    <div class="step">
                        <div class="step-number">4</div>
                        <h3>Download</h3>
                        <p>Click download and enjoy your media</p>
                    </div>
                </div>
            </div>
        </main>

        <footer>
            <p>&copy; 2023 AUGUU Mzumbe Downloader. All rights reserved.</p>
            <p>This service is for educational purposes only. Please respect copyright laws.</p>
        </footer>
    </div>
</body>

</html>