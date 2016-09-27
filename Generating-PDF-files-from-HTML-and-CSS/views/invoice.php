<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Invoice</title>

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img src="http://s3.amazonaws.com/s3.codecourse.com/public/img/email/logo.png" alt="Codecourse logo" class="pull-right">
                    <h3>Invoice #{{ order }}</h3>
                    <h5>Amount due: <strong>£{{ amount }}</strong></h5>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <p>Billed to {{ name }}.</p>

                    157 Never Road<br>
                    London<br>
                    NE7 3R0
                </div>
                <div class="col-md-6">
                    <p class="text-muted">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima recusandae vel, error deleniti iste, odit excepturi aspernatur doloremque labore, hic tempore ratione provident dolorum dolore suscipit earum reiciendis perspiciatis necessitatibus iusto tenetur ab quibusdam quae. Aliquid veniam, perspiciatis incidunt dolorum! Distinctio, nostrum. Dignissimos, quae dolore, pariatur illum nostrum delectus unde!
                    </p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <p>Send us your money to: 225000001 10-20-69.</p>
                </div>
            </div>
        </div>
    </body>
</html>