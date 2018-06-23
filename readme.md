# 挑战部署测试镜像

**[Type]** Top Image

本镜像基于php7并使用ThinkPHP5框架

--------

## Deploy

Web应用的代码应放置在`APP`目录中，期望的入口文件位于`APP/public/index.php`

Web应用应当读取以下环境变量以获得应用状态与数据库信息

```
APP_NAME
APP_STATUS
APP_MYSQL_HOST
APP_MYSQL_NAME
APP_MYSQL_USER
APP_MYSQL_PASS
APP_MYSQL_PORT
APP_MYSQL_PREFIX
```

应用中自定义的依赖组件或其他对于部署环境的修改命令应放置于`script/build`hook中。`script/test`中可添加自定义的单元测试

本测试镜像默认部署的应用不修改Nginx与PHP/PHP-FPM的配置文件，且不需要在容器启动时添加额外的进程

## Default configurations

可以通过此示例应用查看tz-php7镜像的默认配置。这些信息在Web应用可能使用不够安全的操作时、Web应用有高并发的需求或较长的响应时间时、或需要修改Nginx配置以实现高级路由或负载均衡时显得尤为重要

```
# php info
https://tmp2.tiaozhan.com/index.php/index/index/info

# $_SERVER
https://tmp2.tiaozhan.com/index.php/index/index/server
```

如果有必要应用自定义配置，请参照tz-php7镜像的代码并在`script/build`hook中添加修改配置的命令

## Usage

首先编译本镜像，必须使用`configure`生成编译配置，直接使用docker build会失败。

```sh
# 生成编译配置
./configure --name=$MY_APP

# 开始编译
make build
```

如果编译成功，通过`docker images`能看到编译完成的镜像。

并且可基于存在的镜像运行容器：

```sh
make startd
```

当镜像尚未构建时，可执行：

构建镜像并执行自定义的单元测试

```sh
make unit
```

构建镜像并运行容器：

```sh
make run

```
**注意**如果存在旧版本的当前镜像（及其容器），`build`, `unit`, `run`操作会先将它们删除

你可以通过覆盖入口文件调用shell调试镜像

```sh
docker run -it --rm registry.op.tiaozhan.com/$MY_APP /bin/sh
```
或者直接进入一个*正在运行*的容器进行实时调试

```sh
docker exec -it $MY_APP /bin/sh
```
