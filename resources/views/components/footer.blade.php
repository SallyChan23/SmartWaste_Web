<footer class="text-white text-left py-4" style="background-color: #183F23; bottom: 0;">
    <div class="container mt-5">
        <div class="content row justify-content-between">
            <div class="col-md-4 mb-3">
                <h5 class="mb-4 fs-2">SmartWaste</h5>
                <p><i class="fas fa-phone-alt"></i> +1234-567-8910</p>
                <p><i class="fas fa-envelope"></i> smartwaste@gmail.com</p>
            </div>
            <div class="col-md-2 mb-3">
                <h5 class="mb-4 fs-4">@lang('footer.company')</h5>
                <ul class="list-unstyled fs-6">
                    <li><a href="{{ route('aboutUs') }}" class="text-white">@lang('footer.about-us')</a></li>
                    <li><a href="{{ route('aboutUs') }}#service" class="text-white">@lang('footer.service')</a></li>
                    <li><a href="{{ route('aboutUs') }}#getInTouch" class="text-white">@lang('footer.contact')</a></li>
                </ul>
            </div>
            <div class="col-md-2 mb-3">
                <h5 class="mb-4 fs-4">@lang('footer.help')</h5>
                <ul class="list-unstyled fs-6">
                    <li><a href="{{ route('faq') }}" class="text-white">@lang('footer.faq')</a></li>
                    <li><a href="#" class="text-white">@lang('footer.shipping')</a></li>
                    <li><a href="#" class="text-white">@lang('footer.drop-in')</a></li>
                </ul>
            </div>
            <div class="col-md-2 mb-3">
                <h5 class="mb-4 fs-4">@lang('footer.socials')</h5>
                <ul class="list-unstyled fs-6">
                    <li><a href="https://www.instagram.com/smartwaste2024?igsh=OTIycGM0dDRseTgw&utm_source=qr" class="text-white"><i class="fab fa-instagram"></i> Instagram</a></li>
                    <li><a href="https://www.tiktok.com/@smartwaste2024?_t=ZS-8sF7JqLGf7X&_r=1" class="text-white"><i class="fab fa-tiktok"></i> TikTok</a></li>
                    <li><a href="https://x.com/SmartWaste2024" class="text-white"><i class="fa-brands fa-x-twitter"></i> X</a></li>
                </ul>
            </div>
        </div>
    </div>

    <hr style="border: none; border-top: 1px solid #fff;">

    <div class="text-center mt-2">
        <p>&copy; 2024 - SmartWaste</p>
    </div>
</footer>

<style>
    @media (max-width: 768px) {
        .content {
            display: grid;
            grid-template-columns: repeat(2, 1fr); 
            gap: 50px; 
            text-align: left;
            padding-left: 40px;
        }

        .content > div {
            justify-content: center;
            align-items: center;
        }

        .content h5{
            font-size: 150% !important; 
        }

        .content ul, .content p {
            font-size: 90% !important; 
        }
    }

    footer {
        overflow: visible;
    }
</style>
