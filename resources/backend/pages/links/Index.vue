<template>
  <div class="lins">
    
    <card>
      <curd></curd>
      <Button style="margin: 10px 0;" type="primary" @click="handleCreate()">新增</Button>
      <Table :columns="columns" :data="linksData"></Table>
      <Page :total="10" style="margin-top:10px"/>
    </card>
    <Modal v-model="modalShow" :title="modalStatusMapTitle[modalStatus]">
      <Alert type="error" closable show-icon v-if="errorStatus">
        {{ errorMessage.message }}！！！
        <span slot="desc">
          <template v-for="error in errorMessage.errors">{{ error }}</template>
        </span>
      </Alert>
      <Form :label-width="80" ref="form" :rules="formdDataRuleValidate" :model="formData">
        <FormItem label="链接类型">
          <RadioGroup v-model="formData.type">
            <Radio :label="1">文字链接</Radio>
            <Radio :label="0">LOGO链接</Radio>
          </RadioGroup>
        </FormItem>
        <FormItem label="网站名称" prop="sitename">
          <Input type="text" v-model="formData.sitename"></Input>
        </FormItem>
        <FormItem label="网站URL" prop="siteurl">
          <Input type="text" v-model="formData.siteurl"></Input>
        </FormItem>
        <FormItem label="LOGO" prop="logo">
          <Input type="text" v-model="formData.logo"></Input>
        </FormItem>
        <FormItem label="负责人" prop="master">
          <Input type="text" v-model="formData.master"></Input>
        </FormItem>
        <FormItem label="网站简介" prop="introduce">
          <Input v-model="formData.introduce" type="textarea" :autosize="{minRows: 2,maxRows: 5}"></Input>
        </FormItem>
        <FormItem label="展示顺序" prop="listorder">
          <InputNumber v-model="formData.listorder"></InputNumber>
        </FormItem>
      </Form>
      <div slot="footer">
        <Button
          long
          type="primary"
          @click="modalStatus == 'create' ? createAction('form') : updatehAction('form')"
        >提交</Button>
      </div>
    </Modal>
  </div>
</template>
<script>
import {fetchList,create,update} from "~/api/links";
import curd from '~/components/curd/Index'
export default {
  components: {
    curd
  },

  mounted() {
    this.getLinksData();
  },
  methods: {
    getLinksData() {
      fetchList().then(res => {
        this.linksData = res.data.data;
      });
    },
    handleCreate() {
      this.$refs["form"].resetFields();
      this.modalStatus = "create";
      this.modalShow = true;
    },
    handleEdit(row) {
      this.$refs["form"].resetFields();
      this.modalStatus = "update";
      this.modalShow = true;
      this.formData = Object.assign({}, row);
      console.log(row);
    },

    createAction(name) {
      this.$refs[name].validate();
      console.log(this.formData);
      create(this.formData)
        .then(res => {
          console.log(res);
          this.modalShow = false;
        })
        .catch(err => {
          this.errorStatus = true;
          this.errorMessage = err.response.data;
        });
    },

    updatehAction(name) {
      this.$refs[name].validate(valid => {
        update(this.formData)
          .then(res => {
            let data = res.data;
            for (let row of this.linksData) {
              if (row.id === this.formData.id) {
                let index = this.linksData.indexOf(row);
                this.linksData.splice(index, 1, data);
                break;
              }
            }
            this.modalShow = false;
          })
          .catch(err => {
            this.errorStatus = true;
            this.errorMessage = err.response.data;
          });
      });
    }
  },
  data() {
    return {
      errorStatus: false,
      errorMessage: {},
      modalShow: false,
      modalStatus: "",
      modalStatusMapTitle: {
        create: "新增友情链接",
        update: "修改友情链接"
      },
      formData: {
        id: undefined,
        type: 1,
        sitename: "",
        siteurl: "",
        logo: "",
        master: "",
        introduce: "",
        listorder: 0
      },
      formdDataRuleValidate: {
        sitename: [{ required: true, message: "名称不能为空" }],
        siteurl: [{ required: true, message: "URL不能为空" }]
      },
      linksData: [],
      columns: [
        {
          title: "ID",
          key: "id"
        },
        {
          title: "分类",
          key: "type"
        },
        {
          title: "名称",
          key: "sitename"
        },
        {
          title: "名称",
          key: "siteurl"
        },
        {
          title: "logo",
          key: "logo"
        },
        {
          title: "状态",
          key: "status"
        },
        {
          title: "操作",
          key: "action",
          width: 150,
          align: "center",
          render: (h, params) => {
            return h("div", [
              h(
                "Button",
                {
                  props: {
                    type: "primary",
                    size: "small"
                  },
                  style: {
                    marginRight: "5px"
                  },
                  on: {
                    click: () => {
                      this.handleEdit(params.row);
                    }
                  }
                },
                "View"
              ),
              h(
                "Button",
                {
                  props: {
                    type: "error",
                    size: "small"
                  },
                  on: {
                    click: () => {
                      this.remove(params.index);
                    }
                  }
                },
                "Delete"
              )
            ]);
          }
        }
      ]
    };
  }
};
</script>