# 将上传的pdf文件转换为一张png长图

这是一个简单的Web应用，上传pdf文件，然后，等待后台转换为长图

## 新建文件夹

* uploads
* converted

## 注意事项

* uploads 和 converted这两个文件夹的权限需要注意
* 需要关闭 SELinux  在 centos7 中推荐使用这个命令关闭 `setenforce 0` 

## 依赖: 必须安装这两个才能正常运行

* ImageMagick    `yum install -y ImageMagick`

* ghostscript `yum install -y ghostscript`

## 功能列表
- [x] 将pdf转换为长图
- [ ] 可选择的图片格式
- [ ] 可选择的默认填充背景色


## 优化列表
 - [ ] 优化借口
 - [ ] 美化UI，增加提示信息