<template>
    <div>
        <b-navbar class="is-primary">
            <template #brand>
                
                    <div>
                        <img src="img/logo.png" class="my-img"/>
                    </div>
               
            </template>

             <template #start>
                
                 <b-navbar-item tag="a" href="/home">
                     Home
                 </b-navbar-item>

                  <b-navbar-item tag="a" href="/profile-page">
                     My Profile
                 </b-navbar-item>

                 <!-- <b-navbar-item tag="a" href="/account-panel">
                     Account Panel
                 </b-navbar-item> -->

                 

            </template>

             <template #end>
                 <b-navbar-dropdown :label="fname">
                     <b-navbar-item tag="a" href="/account-panel">
                        Change Password
                     </b-navbar-item>
                 </b-navbar-dropdown>
                    <b-navbar-item tag="div">
                        <form action="/logout" method="post">
                            <csrf></csrf>
                             <button class="button is-danger">LOGOUT</button>
                         </form>
                 </b-navbar-item>
            </template>

            
        </b-navbar>
        
        
    </div>
</template>

<script>
export default {

    props: ['fname'],

    data() {
      return{
          

      }  
    },
}
</script>
<style scoped>
    .my-img{
        height: 80px;
    }
</style>