<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đặt hàng thành công</title>
    <style>
      body {
        font-family: "Roboto", Arial, sans-serif;
        background-color: #f8f8f8;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
      }
      .container {
        text-align: center;
        padding: 40px;
        border-radius: 8px;
        background-color: #fff;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      }
      .icon {
        font-size: 48px;
        color: #00cc00;
        margin-bottom: 20px;
      }
      .header {
        font-size: 32px;
        color: #333;
        margin-bottom: 15px;
      }
      .message {
        font-size: 18px;
        color: #666;
        margin-bottom: 30px;
      }
      .btn-container {
        margin-top: 30px;
      }
      .btn {
        padding: 12px 24px;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        background-color: #007bff;
        color: #fff;
        cursor: pointer;
        transition: background-color 0.3s ease;
      }
      .btn:hover {
        background-color: #0056b3;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="icon">&#10004;</div>
      <div class="header">Đặt hàng thành công!</div>
      <div class="message">
        Cảm ơn bạn đã mua hàng. Chúng tôi đã nhận được đơn đặt hàng của bạn.
      </div>
      <div class="message">
        Thông tin chi tiết về đơn hàng đã được gửi tới địa chỉ email của bạn.
      </div>
      <div class="btn-container">
        <button class="btn" id="sendEmailBtn">Gửi email xác nhận</button>
      </div>
    </div>

    <script>
      const sendEmailButton = document.getElementById("sendEmailBtn");

      sendEmailButton.addEventListener("click", () => {
        const userEmail = "your_email@example.com";
        const subject = "Xác nhận mua hàng";
        const message =
          "Cảm ơn bạn đã mua hàng! Đơn đặt hàng của bạn đã được xác nhận.";
        const mailtoLink = `mailto:${userEmail}?subject=${encodeURIComponent(
          subject
        )}&body=${encodeURIComponent(message)}`;

        window.location.href = mailtoLink;
      });
    </script>
  </body>
</html>
