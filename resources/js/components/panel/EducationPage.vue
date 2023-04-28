<template>
    <div class="section">
        <div class="columns">
            <div class="column is-8 is-offset-2">
                <b-table
                        :data="data"
                        :loading="loading"
                        paginated
                        backend-pagination
                        :total="total"
                        :per-page="perPage"
                        @page-change="onPageChange"
                        aria-next-label="Next page"
                        aria-previous-label="Previous page"
                        aria-page-label="Page"
                        :show-detail-icon=true
                        aria-current-label="Current page"
                        :default-sort-direction="defaultSortDirection"
                        @sort="onSort">

                        <b-table-column field="education_id" label="ID" v-slot="props">
                                {{ props.row.education_id }}
                        </b-table-column>

                        <b-table-column field="level" label="Level" v-slot="props">
                                {{ props.row.level }}
                        </b-table-column>

                        <b-table-column field="school_name" label="School Name" v-slot="props">
                                {{ props.row.school_name }}
                        </b-table-column>


                        <b-table-column field="remark" label="Remark" v-slot="props">
                                {{ props.row.remark }}
                        </b-table-column>

                        <b-table-column field="unit" label="Unit" v-slot="props">
                                {{ props.row.unit }}
                        </b-table-column>

                        <b-table-column field="" label="Action" v-slot="props">
                             <a class="button is-small is-warning" :href="'/panel/education-page/' +props.row.education_id+ '/edit'">EDIT</a>
                              <button class="button is-small is-danger" @click="confirmDelete(props.row.education_id)">DELETE</button>
                        </b-table-column>
                   

                    
                </b-table>
            </div> <!--Close Column-->
        </div> <!--Close Columns-->
    </div> <!--Close Section-->
    
</template>

<script>
export default {
    props: ['educations', 'id'],
    data(){
        return{
            fields: {},
            errors: {},
            educationsJSON: null,
            data: [],
            total: 0,
            loading: false,
            sortField: 'education_id',
            sortOrder: 'desc',
            page: 1,
            perPage: 20,
            defaultSortDirection: '',
            globalId: 0,
        }
        
    },
    methods: {
      initializeData(){
          this.educationsJSON = JSON.parse(this.educations);
          this.data = this.educationsJSON;
          this.loadData();

      },
      confirmDelete(dataId){
            this.$buefy.dialog.confirm({
                title: 'DELETE?',
                message: 'Are you sure you want to delete this data?',
                type: 'is-danger',
                onConfirm: ()=> this.submitDelete(dataId)
            })
        },
        submitDelete(dataId){  
            axios.delete(`/panel/education-page/` + dataId).then(res=>{
               window.location = '/panel/user-page'
            })
        },

    //   update(){
    //         axios.put('/panel/user-page/'+this.userJSON.user_id, this.fields).then(res=>{
    //             if(res.data.status === 'updated')
    //             this.$buefy.dialog.alert({
    //                 title: 'UPDATED!',
    //                 message: 'Your profile successfully updated.',
    //                 type: 'is-success',
    //                 onConfirm: ()=> window.location='/panel/user-page'
    //             });
    //         })

    //   },

      loadAsyncData(){
            const params = [
                `sort_by=${this.sortField}.${this.sortOrder}`,
                `perpage=${this.perPage}`,
                `page=${this.page}`
            ].join('&');

             this.loading = true;

             axios.get(`/ajax-education-page?${params}`).then(({data})=>{
                 this.data=[];
                 let currentTotal = data.Total;
                 if(data.total / this.perPage > 1000){
                     currentTotal = this.perPage * 1000
                 }
                 this.total = currentTotal;
                 data.data.forEach((item)=>{
                     this.data.push(item);

                 });
                  this.loading = false
             })

             .catch((error) => {
                    this.data = []
                    this.total = 0
                    this.loading = false
                    throw error
                    });
        

        },
         onPageChange(page) {
            this.page = page
            this.loadAsyncData();
        },

        onSort(field, order) {
            this.sortField = field
            this.sortOrder = order
            this.loadAsyncData();
        },
         setPerPage(){
            this.loadAsyncData();
        },
        getData(dataId){
                axios.get('/panel/education-page/'+ dataId).then(res=>{
                this.fields = res.data;

            })
        },

        loadData(){
            // // let currentTotal = this.educations.JSON.Total;
            // // console.log(currentTotal);
            //     //  if(this.educations.JSON.total / this.perPage > 1000){
            //     //      currentTotal = this.perPage * 1000
            //     //  }
            //     //  this.total = currentTotal;
            //      this.educations.JSON.forEach((item)=>{
            //          this.data.push(item);

            //      });
            //       this.loading = false

          //  this.data = this.educationsJSON;
        }

    },//end method
    mounted(){
        this.initializeData();
       // this.loadAsyncData();
       //this.loadData();

    }
}
</script>

<style scoped>
  
</style>
