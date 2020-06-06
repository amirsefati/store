<template>
   <div>
        <div>
            <router-view></router-view>
        </div>
   </div>
</template>

<script>
export default {
    beforeCreate() {

            this.$vs.loading({type:'sound',background:'#22c16b',color:'rgb(255, 255, 255)'})
            setTimeout( ()=> {
                this.$vs.loading.close()
            },1000);
    

            axios.post('/store/islogin',{
                data : {'data' : 'isLogin'}
            }).then((response)=>{
                if(response.data === 100){
                    this.$router.push('/store').catch(err => {})
                }else{
                    this.$router.push('/signin').catch(err => {})

                }
            })
    },
}
</script>