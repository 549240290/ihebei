<template>
  <Menu theme="dark" width="auto" :accordion="accordion" @on-select="toPath">
    <Submenu name="1">
      <template slot="title">
        <Icon type="ios-paper"/>内容管理
      </template>
      <MenuItem name="article" >文章</MenuItem>
      <MenuItem name="categorys">类别</MenuItem>
      <MenuItem name="tags">标签</MenuItem>
      <MenuItem name="links" >友情链接</MenuItem>
    </Submenu>
    <Submenu name="2">
      <template slot="title">
        <Icon type="ios-people"/>用户管理
      </template>
      <MenuItem name="2-1">用户</MenuItem>
      <MenuItem name="2-2">角色</MenuItem>
      <MenuItem name="2-3">权限</MenuItem>
    </Submenu>
    <Submenu name="3">
      <template slot="title">
        <Icon type="ios-stats"/>统计分析
      </template>
      <MenuGroup title="使用">
        <MenuItem name="3-1">新增和启动</MenuItem>
        <MenuItem name="3-2">活跃分析</MenuItem>
        <MenuItem name="3-3">时段分析</MenuItem>
      </MenuGroup>
      <MenuGroup title="留存">
        <MenuItem name="3-4">用户留存</MenuItem>
        <MenuItem name="3-5">流失用户</MenuItem>
      </MenuGroup>
    </Submenu>
  </Menu>
</template>

<script>
export default {
  data() {
    return {
      theme2: "light"
    };
  },
  props: {
    accordion:Boolean
  },
  methods:{
    toPath(name) {
      this.$emit('goTarget',name)
    }
  }
};
</script>
