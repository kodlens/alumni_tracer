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

                        <b-table-column field="eligibility_id" label="ID" v-slot="props">
                                {{ props.row.eligibility_id }}
                        </b-table-column>

                        <b-table-column field="eligible" label="Eligibility" v-slot="props">
                                {{ props.row.eligible }}
                        </b-table-column>

                        <b-table-column field="date_acquired" label="Eligible since (year)" v-slot="props">
                                {{ props.row.date_acquired }}
                        </b-table-column>


                        <b-table-column field="rating" label="Rating" v-slot="props">
                                {{ props.row.rating }}
                        </b-table-column>

                        <b-table-column field="license_id" label="License Number" v-slot="props">
                                {{ props.row.license_id }}
                        </b-table-column>

                        <b-table-column field="" label="Action" v-slot="props">
                             <a class="button is-small is-warning" :href="'/panel/eligibility-page/' +props.row.eligibility_id+ '/edit'">EDIT</a>
                              <button class="button is-small is-danger" @click="confirmDelete(props.row.eligibility_id)">DELETE</button>
                        </b-table-column>
                   

                    
                </b-table>
            </div> <!--Close Column-->
        </div> <!--Close Columns-->
    </div> <!--Close Section-->
    
</template>

<script>
export default {
    props: ['eligibilities', 'id'],
    data(){
        return{
            fields: {},
            errors: {},
            eligibilitiesJSON: null,
            data: [],
            total: 0,
            loading: false,
            sortField: 'eligibility_id',
            sortOrder: 'desc',
            page: 1,
            perPage: 20,
            defaultSortDirection: '',
            globalId: 0,
        }
        
    },
    methods: {
      initializeData(){
          this.eligibilitiesJSON = JSON.parse(this.eligibilities);
          this.data = this.eligibilitiesJSON;
         // this.loadData();

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
            axios.delete(`/panel/eligibility-page/` + dataId).then(res=>{
                window.location = '/panel/user-page'
            })
        },


      loadAsyncData(){
            const params = [
                `sort_by=${this.sortField}.${this.sortOrder}`,
                `perpage=${this.perPage}`,
                `page=${this.page}`
            ].join('&');

             this.loading = true;

             axios.get(`/ajax-eligibility-page?${params}`).then(({data})=>{
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
                axios.get('/panel/eligibility-page/'+ dataId).then(res=>{
                this.fields = res.data;

            })
        },

        

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
