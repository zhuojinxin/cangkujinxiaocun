layui.use('table', function(){
  var table = layui.table;
  
  table.render({
    elem: '#test'
    ,url:'../api/erp/stock',
	method:'get',
	 headers: {
	          'Accept':'application/json',
              'Authorization':'Bearer '+$.cookie('token')
          }
    ,cellMinWidth: 80 //全局定义常规单元格的最小宽度，layui 2.2.1 新增
    ,cols: [[
      {field:'id', width:80, title: 'ID', sort: true}
      ,{field:'user_name', width:180, title: '最近操作用户'}
      ,{field:'warehouses_name', width:180, title: '所在仓库', sort: true}
         ,{field:'good_name', width:180, title: '商品名称', sort: true}
         ,{field:'amount', width:180, title: '库存量', sort: true}

    ]]
  });
});