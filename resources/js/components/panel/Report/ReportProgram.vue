<template>
    <div>
        <div class="section">
            <div class="columns">
                <div class="column is-10 is-offset-1">

                    <div class="level">
                        <div class="level-left">
                            <div class="level-item">
                                <b-field label="Programs">
                                    <b-select v-model="program" @input="loadAsyncData">
                                        <option v-for="(item, index) in this.programsJSON" :key="index" :value="item.program">{{ item.program }}</option>
                                    </b-select>
                                </b-field>
                            </div>
                        </div>
                        <div class="level-right">
                            <div class="level-item">
                                <b-field label="Search">
                                    <b-input v-model="search" placeholder="Seach Lastname..." @keyup.native.enter="loadAsyncData"/>
                                </b-field>
                            </div>

                            <div class="level-item">
                                <b-field label="Year Grad">
                                    <b-input v-model="search_year_grad" placeholder="Seach Year Grad..." @keyup.native.enter="loadAsyncData"/>
                                </b-field>
                            </div>
                        </div>
                    </div>

                    <div class="level">
                        <div class="level-right">
                            <div class="level-item">
                                <b-field label="City/Municipality">
                                    <b-input v-model="search_city" placeholder="Seach City..." @keyup.native.enter="loadAsyncData"/>
                                </b-field>
                            </div>
                        </div>
                    </div>

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

                        <b-table-column field="user_id" label="ID" v-slot="props">
                                {{ props.row.user_id }}
                        </b-table-column>

                        <b-table-column field="fullname" label="Name" v-slot="props">
                                {{ props.row.lname }} , {{ props.row.fname }}  {{ props.row.mname }} ,  {{ props.row.suffix }}
                                <!--Alab , Marvilowe Toraja-->
                        </b-table-column>

                        <b-table-column field="sex" label="Sex" v-slot="props">
                                {{ props.row.sex }}
                        </b-table-column>

                        <b-table-column field="civil_status" label="Civil Status" v-slot="props">
                                {{ props.row.civil_status }}
                        </b-table-column>

                         <b-table-column field="program" label="Program" v-slot="props">
                             {{ props.row.program }}
                         </b-table-column>

                         <b-table-column field="year_graduated" label="Year Graduated" v-slot="props">
                             {{ props.row.year_graduated }}
                         </b-table-column>

                        <b-table-column field="city" label="City/Municipality" v-slot="props">
                            {{ props.row.city_boarding }}
                        </b-table-column>

                        <b-table-column field="" label="Action" v-slot="props">
                            <div class="buttons">
                                <a class="button is-small is-link is-rounded" tag="a" :href="'/report-program/'+props.row.user_id">INFO</a>
                            </div>
                        </b-table-column>
                    </b-table>
                    <div class="buttons">
                        <vue-excel-xlsx
                            :data="data"
                            :columns="columns"
                            :filename="'Alumni Reports'"
                            :sheetname="'Alumni Reports'"
                            class="button is-success">
                            Export to excel
                        </vue-excel-xlsx>
                    </div>

                </div> <!--Close Column-->
            </div> <!--Close Columns-->
        </div> <!--Close Section-->
    </div> <!--end root div-->
</template>

<script>
export default {
    props: ['programs'],

    data(){
        return{
            data: [],
            total: 0,
            loading: false,
            sortField: 'user_id',
            sortOrder: 'desc',
            page: 1,
            perPage: 20,
            defaultSortDirection: '',
            search: '',

            programsJSON: null,
            program: '',

            search_year_grad: '',
            search_city: '',
            columns: [
                {
                    label: "Lastname",
                    field: "lname",
                },
                {
                    label: "First Name",
                    field: "fname",
                },
                {
                    label: "Middle Name",
                    field: "mname",
                },
                {
                    label: "Suffix",
                    field: "suffix",
                },
                {
                    label: "Sex",
                    field: "sex",
                },
                {
                    label: "Civil Status",
                    field: "civil_status",
                },
                {
                    label: "Program",
                    field: "program",
                },
                {
                    label: "Year Graduated",
                    field: "year_graduated",
                },
                {
                    label: "City/Municipality",
                    field: "city_boarding",
                },
            ],

        }
    },
    methods:{

        loadAsyncData(){
            const params = [
                `sort_by=${this.sortField}.${this.sortOrder}`,
                `perpage=${this.perPage}`,
                `page=${this.page}`,
                `lname=${this.search}`,
                `program=${this.program}`,
                `year_grad=${this.search_year_grad}`,
                `search_city=${this.search_city}`,

            ].join('&');

             this.loading = true;

             axios.get(`/axios-users?${params}`).then(({data})=>{
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
                axios.get('/panel/user-page'+ dataId).then(res=>{
                this.fields = res.data;

            })
        },

        initializeData(){
            this.programsJSON = JSON.parse(this.programs);
        },


    }, //close method


    mounted(){
        this.initializeData();
        this.loadAsyncData();
    },

}
</script>
