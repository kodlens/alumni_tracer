<template>
    <div>

       <div class="section">
           <div class="columns">
                <div class="column is-8 is-offset-2">
                    <div class="newsfeed-wrapper panel"  v-for="(newsfeed, index) in this.newsFeeds" :key="index">
                       <div class="newsfeed-header">
                           <span style="font-size: 12px; font-weight: bold;">{{ new Date(newsfeed.created_at) }}</span>
                       </div>
                        <div>
                            <div class="announcement-text">ANNOUNCEMENT</div>
                            <div class="announcement-body">{{ newsfeed.news }}</div>

                        </div>
                   </div> <!--close newsfeed-wrapper-->
               </div> <!--close Column-->
           </div> <!--close Columns-->

       </div> <!--close Section-->

    </div>
</template>

<script>
export default {
        data(){
            return{
                //declare variable
                newsFeeds: [],
            }
        },

        methods: {
            loadNews(){
                axios.get('/ajax-get-newsfeeds').then(res=>{
                    //console.log(res.data);
                    this.newsFeeds = res.data;
                });
            }
        },

        mounted(){
            this.loadNews();
        }
}
</script>

<style scoped>
    .newsfeed-wrapper{
        padding: 15px;
        background-color: rgb(249, 249, 249);
        border-radius: 5px;
        margin-bottom: 20px;
        border-top: 2px solid green;

    }

    .newsfeed-header{
       display: flex;
       justify-content: flex-end;
    }

    .announcement-text{
        margin-top: 15px;
        font-size: 1.3em;
        font-weight: bold;
    }

    .announcement-body{
        margin-top: 15px;
        margin-left: 15px;
        margin-bottom: 20px;

    }
</style>
