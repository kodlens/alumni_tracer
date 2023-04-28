<template>
    <div>
        <b-navbar class="is-primary">
            <template #brand>
               <div>
                    <img src="/img/logo.png" class="my-img"/>
                 </div>
            </template>

             <template #start>

                 <b-navbar-item tag="a" href="/panel/news-feed">
                     News Feed
                 </b-navbar-item>

                  <b-navbar-item tag="a" href="/panel/user-page">
                     User List
                 </b-navbar-item>

                 <b-navbar-item tag="a" href="/panel/program-list">
                     Program List
                 </b-navbar-item>

                 <b-navbar-dropdown label="Report">
                     <b-navbar-item tag="a" href="/report-program">
                         Report
                     </b-navbar-item>

                   

                 </b-navbar-dropdown>

            </template>

             <template #end>
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
