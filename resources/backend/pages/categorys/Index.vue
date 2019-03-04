<template>
  <div class="category">
    <card>
      <Button style="margin: 10px 0;" type="primary" @click="handleCreate(0)">新增</Button>
      <tree-table
        :is-fold="false"
        expand-key="title"
        :expand-type="false"
        :selectable="false"
        :columns="treeColumns"
        :data="treeTableData"
      >
        <template slot="ismenu" slot-scope="scope">
          <template v-if="scope.row.ismenu">
            <Icon type="md-checkmark-circle-outline" size="20"/>
          </template>
          <template v-else>
            <Icon type="md-close-circle" size="20"/>
          </template>
        </template>
        <template slot="action" slot-scope="scope">
          <Button type="success" @click="callOn(scope.row)">访问</Button>
          <Button @click="handleEdit(scope.row)">修改</Button>
          <Button @click="handleCreate(scope.row.id)">添加子栏目</Button>
          <Button type="warning" @click="handleRemove(scope.row.id)">删除</Button>
        </template>
      </tree-table>
    </card>
    <Modal v-model="modalShow" :title="modalStatusMapTitle[modalStatus]">
      <Alert type="error" closable show-icon v-if="errorStatus">
        {{ errorMessage.message }}！！！
        <span slot="desc">
          <template v-for="error in errorMessage.errors">
            {{ error }}
          </template>
        </span>
      </Alert>
      <Form :label-width="80" ref="form" :rules="formdDataRuleValidate" :model="formData">
        <FormItem label="栏目名称" prop="title">
          <Input type="text" v-model="formData.title"></Input>
        </FormItem>
        <FormItem label="上级栏目" prop="parentid">
          <Select v-model="formData.parentid">
            <Option :value="0">顶级栏目</Option>
            <Option v-for="item in optionList" :key="item.id" :value="item.id">
              {{ '&#160;'.repeat(6*item.level) }}
              {{ item.level ? item.separator : '' }}
              {{ item.title }}
            </Option>
          </Select>
        </FormItem>
        <FormItem label="选择模板" prop="template">
          <Select v-model="formData.template">
            <Option value="0">New York</Option>
            <Option value="1">London</Option>
            <Option value="2">Sydney</Option>
          </Select>
        </FormItem>

        <FormItem label="设为菜单" prop="ismenu">
          <RadioGroup v-model="formData.ismenu">
            <Radio :label="0">
              <span>否</span>
            </Radio>
            <Radio :label="1">
              <span>是</span>
            </Radio>
          </RadioGroup>
        </FormItem>

        <FormItem label="权重值" prop="weight">
          <InputNumber v-model="formData.weight"></InputNumber>
        </FormItem>
      </Form>
      <div slot="footer">
        <Button
          long
          type="primary"
          @click="modalStatus == 'create' ? createAction('form') : updateAction('form')"
        >提交</Button>
      </div>
    </Modal>
  </div>
</template>
<script>
import {fetchList,fetchItem,create,update,removeItem} from "~/api/category";
import TreeTable from "tree-table-vue";

export default {
  components: {
    TreeTable
  },

  mounted() {
    this.getCategoryData();
  },
  methods: {
    //创建表单
    handleCreate(id) {
      this.resetForm();
      this.formData.parentid = id;
      this.modalShow = true;
      this.modalStatus = "create";
    },

    //修改表单
    handleEdit(row) {
      this.resetForm();
      this.modalShow = true;
      this.modalStatus = "update";
      this.formData = Object.assign({}, row);
      console.log(row);
    },

    //创建动作
    createAction(name) {
      this.$refs[name].validate();
      create(this.formData)
        .then(res => {
          console.log(res)
          this.getCategoryData();
          this.modalShow = false;
        })
        .catch(err => {
          //console.log(err.response)
          this.errorStatus = true
          this.errorMessage = err.response.data
          console.log(this.errorMessage)
        });
    },

    //修改动作
    updateAction(name) {
      this.$refs[name].validate();
      update(this.formData)
        .then(res => {
          this.getCategoryData();
          this.modalShow = false;
        })
        .catch(err => {
          
        });
    },

    //访问
    callOn(row) {
      console.log(row.title);
      this.$Message.info("跳转到前台栏目==>" + row.title);
    },

    //获取数据
    getCategoryData() {
      fetchList().then(res => {
        this.treeTableData = res.data.tree;
        this.optionList = res.data.list;
      });
    },

    //删除
    handleRemove(id) {
      this.$Modal.confirm({
        title: "你确认要删除当前栏目吗？",
        content: "<p>如果当前栏目下有子栏目也将一并删除！！！</p>",
        onOk: () => {
          removeItem(id)
            .then(res => {
              this.getCategoryData();
            })
            .catch(err => {
              this.$Message.error("操作失败");
              console.log(err);
            });
        }
      });
    },

    //表单重置
    resetForm() {
      this.$refs["form"].resetFields();
    }
  },
  data() {
    return {
      modalShow: false,
      modalStatus: "",
      modalStatusMapTitle: {
        create: "新增栏目",
        update: "修改栏目"
      },
      parentOption: {},
      formData: {
        id: undefined,
        title: "",
        parentid: 0,
        ismenu: 1,
        template: "",
        weight: 1
      },
      formdDataRuleValidate: {
        title: [{ required: true, message: "栏目名称不能为空" }]
      },
      treeColumns: [
        {
          title: "ID",
          key: "id",
          width: "60px"
        },
        {
          title: "栏目",
          key: "title",
          render: (h, params) => {
            return h(IButton);
          }
        },

        {
          title: "菜单",
          key: "ismenu",
          type: "template",
          template: "ismenu"
        },
        {
          title: "模板",
          key: "template"
        },
        {
          title: "权重值",
          key: "weight"
        },
        {
          title: "操作",
          key: "action",
          minWidth: "200px",
          type: "template",
          template: "action"
        }
      ],
      treeTableData: [],
      optionList: [],
      errorStatus: false,
      errorMessage:{}
    };
  }
};
</script>