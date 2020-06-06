<template>
    <div class="row login_background">
        <div class="col-md-2 login_top_margin"></div>
        <div class="col-md-8 mt-3">
            <div class="row login_box">
                <div v-show="this.step === 1" class="col-md-6">
                    <div class="login_input_box">
                        <p style="font-size:25px;font-weight:bold">فروشگاه من </p>
                        <p style="font-weight:bold;margin-top:50px">ورود به حساب کاربری</p>
                        <vs-input icon-after="true" style="margin-top:30px;width:85%" icon="phone" label-placeholder="شماره تلفن" v-model="phone"/>
                        <vs-input icon-after="true" style="margin-top:30px;width:85%"  icon="https" label-placeholder="پسورد" v-model="pass"/>
                        <vs-button v-on:click="loginbtn" color="success" type="gradient" style="margin-top:40px">ورود</vs-button>
                        <p style="font-size:12px;margin-top:5px;">فراموشی پسورد</p>
                        <p v-on:click="step_login(2)" class="login_create_account">ایجاد حساب کاربری
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0z" fill="none"/><path d="M21 11H6.83l3.58-3.59L9 6l-6 6 6 6 1.41-1.41L6.83 13H21z"/></svg>
                        </p>
                    </div>
                </div>

                <div v-show="this.step === 2" class="col-md-6">
                    <div class="login_input_box">
                        <p style="font-size:25px;font-weight:bold">فروشگاه من </p>
                        <p style="font-weight:bold;margin-top:50px"> ثبت نام در سایت     </p>
                        <vs-input icon-after="true" style="margin-top:30px;width:85%" icon="accessibility" label-placeholder="نام کاربری" v-model="name"/>
                        <vs-input icon-after="true" style="margin-top:30px;width:85%" icon="phone" label-placeholder="شماره تلفن" v-model="phone"/>
                        <vs-button v-on:click="send_sms" color="success" type="gradient" style="margin-top:40px">ارسال پسورد</vs-button>
                        <p v-on:click="step_login(1)" class="login_create_account"> ورود
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0z" fill="none"/><path d="M21 11H6.83l3.58-3.59L9 6l-6 6 6 6 1.41-1.41L6.83 13H21z"/></svg>
                        </p>
                    </div>
                </div>

                <div v-show="this.step === 3" class="col-md-6">
                    <div class="login_input_box">
                        <p style="font-size:25px;font-weight:bold">فروشگاه من </p>
                        <p style="font-weight:bold;margin-top:50px">  تایید کد ارسالی  </p>
                        <vs-input icon-after="true" style="margin-top:30px;width:85%" icon="phone" disabled="true" label-placeholder="شماره تلفن" v-model="phone"/>
                        <vs-input icon-after="true" style="margin-top:30px;width:85%" icon="https" autofocus="true" label-placeholder="پسورد پیامک شده" v-model="pass"/>

                        <vs-button v-on:click="verify_sms_register" color="success" type="gradient" style="margin-top:40px">تایید پسورد</vs-button>
                        <p v-on:click="step_login(2)" class="login_create_account"> ثبت نام
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0z" fill="none"/><path d="M21 11H6.83l3.58-3.59L9 6l-6 6 6 6 1.41-1.41L6.83 13H21z"/></svg>
                        </p>
                    </div>
                </div>

                <div class="col-md-6 signin_hide_image">
                    <img src="/assets/img/image_signin.png" width="90%" class="login_img_top" alt="">
                </div>
            </div>

        </div>
        
    </div>
</template>

<script>
export default {
    data(){
        return{
            phone : '',
            pass : '',
            name : '',
            step : 1,
        }
    },
   
    methods:{
        step_login:function(level){
            this.step = level
        },
        
        loginbtn:function(){
            if(this.phone.length > 11){
                 this.$vs.notify({title:'خطا در ورود به سایت',text:'شماره تلفن را لطفا به نحوه صحیح وارد کنید',color:'red',position:'top-center'})
            }
            else if(this.phone.length < 10){
                 this.$vs.notify({title:'خطا در ورود به سایت',text:'شماره تلفن را لطفا به نحوه صحیح وارد کنید',color:'red',position:'top-center'})
            }
            else if(this.pass.length < 6){
                 this.$vs.notify({title:'خطا در ورود به سایت',text:' حداقل گذواژه 6 کاراکتر میباشد ',color:'red',position:'top-center'})
            }
            else{
                axios.post('/login_attemp',{
                    data : {'phone' : this.phone , 'pass' : this.pass}
                }).then((response)=>{
                    if(response.data === 103){
                        this.$vs.notify({title:'خطا در ورود به سایت',text:'چنین شماره تلفنی در سیستم ثبت نشده است',color:'red',position:'top-center'})
                    }else if(response.data === 104){
                        this.$vs.notify({title:'خطا در ورود به سایت',text:'گذرواژه صحیح نمیباشد',color:'warning',position:'top-center'})
                    }else if(response.data === 100){
                        this.$vs.notify({title:'خطا در ورود به سایت',text:'ورود موفقیت آمیز خوش آمدید',color:'success',position:'top-center'})
                        this.$router.push('/store').catch(err => {})
                    }else{
                        this.$vs.notify({title:'خطا در ورود به سایت',text:'خطا در سیستم لطفا به پشتیبانی اطلاع دهید',color:'dark',position:'top-center'})
                    }
                })
            }
        },
        send_sms:function(){
            if(this.phone.length > 11){
                 this.$vs.notify({title:'خطا در ورود به سایت',text:'شماره تلفن را لطفا به نحوه صحیح وارد کنید',color:'red',position:'top-center'})
            }
            else if(this.phone.length < 10){
                 this.$vs.notify({title:'خطا در ورود به سایت',text:'شماره تلفن را لطفا به نحوه صحیح وارد کنید',color:'red',position:'top-center'})
            }
            else if(this.name.length < 3){
                 this.$vs.notify({title:'خطا در ورود به سایت',text:' حداقل نام کاربری 3 کاراکتر میباشد ',color:'red',position:'top-center'})
            }
            else{
                axios.post('/send_sms',{
                    data : {'phone' : this.phone , 'name' : this.name}
                }).then((response)=>{
                    if(response.data === 105){
                        this.$vs.notify({title:'خطا در ورود به سایت',text:'چنین شماره تلفنی در سیستم ثبت شده است لطفا لاگین کنید',color:'red',position:'top-center'})
                    }else if(response.data === 100){
                        this.step = 3
                    }else{
                        this.$vs.notify({title:'خطا در ورود به سایت',text:'خطا در سیستم لطفا به پشتیبانی اطلاع دهید',color:'dark',position:'top-center'})
                    }
                })
            }
        },
        verify_sms_register:function(){
          if(this.pass.length > 6){
                 this.$vs.notify({title:'خطا در ورود به سایت',text:'فیلد پسورد حاوی 6 کاراکتر می باشد دقت کنید',color:'red',position:'top-center'})
            }
            else if(this.pass.length < 6){
                 this.$vs.notify({title:'خطا در ورود به سایت',text:'فیلد پسورد حاوی 6 کاراکتر می باشد دقت کنید',color:'red',position:'top-center'})
            }
            else{
                axios.post('/verify_sms_register',{
                    data : {'phone' : this.phone , 'pass' : this.pass}
                }).then((response)=>{
                   if(response.data === '106'){
                        this.$vs.notify({title:'خطا در ورود به سایت',text:'کد وارد شده صحیح نمیباشد دوباره تلاش کنید',color:'red',position:'top-center'})
                   }else if(response.data === '100'){
                        this.$vs.notify({title:'خطا در ورود به سایت',text:'ورود موفقیت آمیز خوش آمدید',color:'success',position:'top-center'})
                        this.$router.push('/store').catch(err => {})
                   }else{
                        this.$vs.notify({title:'خطا در ورود به سایت',text:'خطا در سیستم لطفا به پشتیبانی اطلاع دهید',color:'dark',position:'top-center'})
                   }
                })
            }  
        }
    }
}
</script>

<style>
   .vuesax-app-is-ltr .vs-input--input.icon-after-input+.vs-input--placeholder{
       padding-right:50px;
   } 
   .vuesax-app-is-ltr .vs-input--input.icon-after-input{
       padding-right:50px;
   }
   .vuesax-app-is-ltr .vs-input--icon.icon-after{
       padding-left: 6px;
   }
   .vs-button--text{
       padding: 1px 30px 1px;
       border-radius: 20px;
   }
</style>