<style>
    :root{
            --basic:#F4F7F0;
            --darkgreen:#183F23;
            --lightgreen: #A0B948;
            --grey:#E7E7E7;
            --primaryFont: 'Poppins', serif;
            --secondaryFont: 'Lora', serif;
    }

    .list-unstyled {
        list-style: none;
        padding: 0;
    }

    .list-unstyled li {
        margin-bottom: 10px;
    }

    .list-unstyled li a {
        color: #ffffff;
        text-decoration: none
    }

    .list-unstyled li a:hover {
        text-decoration: underline;
    }


    .nav-link{
        transition: color 0.3s ease;
    }
    .nav-link:hover {
        color: var(--lightgreen)!important;
        text-decoration: underline; 
        text-underline-offset: 2px;
    }
    .nav-link.active{
        color:var(--lightgreen) !important;
    }
    .locale-switch {
        position: relative;
        width: 70px;
        height: 30px;
        display: inline-block;
        font-family:var(--primaryFont);
    }

    .locale-switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .locale-slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: white;
        transition: 0.4s;
        border-radius: 30px;
        border: 1px solid var(--lightgreen);
    }

    .locale-slider::before {
        position: absolute;
        content: "{{ app()->getLocale() == 'en' ? 'EN' : 'ID' }}";
        text-align: center;
        font-size: 12px;
        font-weight: bold;
        color: white;
        height: 28px;
        width: 34px;
        background-color: var(--lightgreen);
        border-radius: 50px;
        transition: 0.4s;
        line-height: 30px;
    }

    input:checked + .locale-slider::before {
        transform: translateX(36px);
    }

    @media(max-width:768px){
        *{
            font-size: 100% !important;
        }
    }
</style>