<template>
    <div>
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

                        <b-table-column field="program_id" label="ID" v-slot="props">
                                {{ props.row.program_id }}
                        </b-table-column>

                        <b-table-column field="program" label="Program" v-slot="props">
                                {{ props.row.program }}
                        </b-table-column>

                        <b-table-column field="program_desc" label="Description" v-slot="props">
                                {{ props.row.program_desc }}
                        </b-table-column>

                        <b-table-column field="created_at" label="Date Created" v-slot="props">
                                {{ props.row.created_at }}
                        </b-table-column>

                        <b-table-column width="180" field="" label="Action" v-slot="props">
                               <div class="buttons">
                                    <button class="button is-small is-warning" @click="modalOpen(props.row.program_id)">
                                     <i class="fa fa-pencil"></i>&nbsp;&nbsp;EDIT</button>
                                <button class="button is-small is-danger" @click="confirmDelete(props.row.program_id)">
                                     <i class="fa fa-trash-o"></i>&nbsp;&nbsp;DELETE</button>
                               </div>
                        </b-table-column>

                    </b-table>

                        <div class="class buttons">
                            <button class="button is-success" @click="modalOpen(0)">ADD PROGRAM</button>
                        </div>
                </div> <!--Close Column-->
            </div> <!--Close Columns-->
        </div> <!--Close Section-->

            <b-modal v-model="programModal" has has-modal-card
            trap-focus width="640" aria-role="dialog" aria-modal>

            <form @submit.prevent="submit">
                <div class="modal-card">

                    <header class="modal-card-head">
                        <p class="modal-card-title">PROGRAM</p>
                        <button type="button" class="delete"
                        @click = "programModal = false"/>
                    </header>

                    <section class="modal-card-body">
                        <div>
                            
                            <b-field label="Program Name">
                                <b-input type="text" v-model="fields.program" placeholder="Program Name" required></b-input>
                            </b-field>
                            <b-field label="Program Description">
                                <b-input type="textarea" v-model="fields.program_desc" placeholder="Description" required></b-input>
                            </b-field>
                            
                        </div>
                    </section>

                    <footer class="modal-card-foot">
                        <b-button
                        label="Close"
                        @click="programModal = false"></b-button>

                        <button class="button is-success">
                            SAVE
                        </button>

                    </footer>

                </div>
            </form>
                
               
           
            </b-modal>
    
    </div> <!--end root div-->
</template>

<script>
export default {
    data(){
        return{
            data: [],
            total: 0,
            loading: false,
            sortField: 'program_id',
            sortOrder: 'desc',
            page: 1,
            perPage: 20,
            defaultSortDirection: '',

            programModal: false,

            fields: {},
            
            globalId: 0,
        }
    },
    methods:{

        loadAsyncData(){
            const params = [
                `sort_by=${this.sortField}.${this.sortOrder}`,
                `perpage=${this.perPage}`,
                `page=${this.page}`
            ].join('&');

             this.loading = true;

             axios.get(`/panel/ajax-get-program-list?${params}`).then(({data})=>{
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
                axios.get('/panel/program-list/'+ dataId).then(res=>{
                this.fields = res.data;

            })
        },
        modalOpen(dataId){
             
            this.programModal = true;
            this.globalId = dataId;
            
            if(dataId > 0){
                this.getData(dataId);
            }
           
        },

        submit(){
            if (this.globalId > 0){
                //update

                axios.put(`/panel/program-list/`+this.globalId, this.fields).then(res=>{
                    this.globalId = 0;
                    this.fields={};
                    this.programModal = false;
                    this.loadAsyncData();
                });
                
            }else{
                //insert

                 axios.post('/panel/program-list/', this.fields).then(res=>{
                    this.fields={};
                    this.programModal = false;
                    this.loadAsyncData();
                });

            }
                        
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
            axios.delete(`/panel/program-list/` + dataId).then(res=>{
                this.loadAsyncData();
            })
        },
    }, //close method
        

    mounted(){
        this.loadAsyncData();
    },

}
</script>