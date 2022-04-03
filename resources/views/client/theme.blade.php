<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>
        .dropbtn {
            cursor: pointer;
            margin-top: -10px
        }

        .dropdown {
            position: relative;
            display: inline-block;
            /* margin-left: 420px; */
            /* padding: 6px 10px; */
            cursor: pointer;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            width: 360px;
            background-color: #fff;
            background-clip: padding-box;
            border-radius: 2px;
            box-shadow: 0 3px 6px -4px rgb(0 0 0 / 12%),
                0 6px 16px 0 rgb(0 0 0 / 8%), 0 9px 28px 8px rgb(0 0 0 / 5%);
            z-index: 1;
            right: 0;

            top: 40px;
            padding-left: 5px;
            padding-right: 5px;
            padding-bottom: 5px;

        }

        .dropdown-content::before {
            content: "";
            position: absolute;
            top: -7px;
            right: 12px;
            width: 0;
            height: 0;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-bottom: 8px solid #fbf4f4;
            filter: drop-shadow(4px 4px 12px rgba(0, 0, 0, 0.4));
        }

        .dropdown-content a {
            color: black;
            padding: 4px 16px;
            text-decoration: none;
            display: block;
        }

        .flex {
            display: flex;
        }

        .box_title {
            margin-left: 16px;
        }

        .first_title {
            font-weight: bold;
        }

        .last_title {
            color: #494949;
            padding-left: 3px;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropbtn img {
            margin-top: -19px;
            width: 19px;
            height: 19px;
        }
    </style>
</head>

<body>
    <div class="dropdown">
        <div class="dropbtn">
            <!-- <img src="https://res.cloudinary.com/hunre/image/upload/v1646639695/vinacse/dots-menu_xvqmnl.png" alt="dots" /> -->
            <img src="client/assets/theme.png">
        </div>
        <div class="dropdown-content">
            <a target="_blank" href="https://vinacase.vn">
                <div class="flex">
                    <div>
                        <img width="50px" src="https://vinaseco.vn/wp-content/uploads/2022/03/vinacase.png" />
                    </div>
                    <div class="box_title">
                        <div>
                            <span class="first_title">VinaCase</span>
                        </div>
                        <div className="description" style="font-size: 14px;">
                            Phần mềm quản lý dịch vụ pháp lý
                        </div>
                    </div>
                </div>
            </a>
            <a target="_blank" href="https://tax.vinaseco.vn">
                <div class="flex">
                    <div>
                        <img width="50px" src="https://vinaseco.vn/wp-content/uploads/2022/03/vinastax.png" />
                    </div>
                    <div class="box_title">
                        <div>
                            <span class="first_title">Vinas</span>
                            <span class="last_title">Tax</span>
                        </div>
                        <div className="description" style="font-size: 14px;">
                            Ứng dụng tra cứu, tính thuế, phí, lệ phí,... Tra cứu bảng giá
                            đất miễn phí
                        </div>
                    </div>
                </div>
            </a>
            <a target="_blank" href="https://web.vinaseco.vn">
                <div class="flex">
                    <div>
                        <img width="50px" src="https://vinaseco.vn/wp-content/uploads/2022/03/vinasweb.png" />
                    </div>
                    <div class="box_title">
                        <div>
                            <span class="first_title">Vinas</span>
                            <span class="last_title">Web</span>
                        </div>
                        <div className="description" style="font-size: 14px;">
                            Nền tảng tạo website tự động cho công ty luật tại Việt Nam
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</body>

</html>