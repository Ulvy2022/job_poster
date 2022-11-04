<template>
    <vue-mailchimp-email-signup-form
        :element-id="'first-email-signup-form'"
        :url="'https://XX.us4.list-manage.com/subscribe/post?u=XXXXXXXXXXXXXX&id=XXXXXXXXXX'"
        :title="'Subscribe to the Newsletter'"
        :subtitle="'We take privacy seriously and we will never spam or sell your information.'"
    />
</template>

<script>
import axios from "axios";
import { googleTokenLogin } from "vue3-google-login";
export default {
    
    methods: {
        register() {
            googleTokenLogin({clientId: '353283530301-lgl6jhjvg6cr3foc30607b3omfqs2ste.apps.googleusercontent.com' }).then((response) => {
                var url = 'https://www.googleapis.com/oauth2/v3/userinfo?access_token=' + response.access_token;
                axios.get(url).then((res)=>{
                    console.log(res.data)
                })
            })
        }
    }

}
</script>

<style scoped>
    * {
        margin:0;
        padding:0;
        font-family: 'Open Sans', sans-serif;
    }
    .input {
        transition: border 0.2s ease-in-out;
        min-width: 280px
    }
    .input:focus+.label,
    .input:active+.label,
    .input.filled+.label {
        font-size: .75rem;
        transition: all 0.2s ease-out;
        top: -0.9rem;
        background-color: #fff;
        color: #1a73e8;
        padding: 0 5px 0 5px;
        margin: 0 5px 0 5px;
    }
    .label {
        transition: all 0.2s ease-out;
        top: 0.4rem;
        left: 0;
    }
</style>



