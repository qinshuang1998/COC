<?php
namespace coc;
/**
 * 视图层装载器
 */
class View
{
  //初始化所需的视图文件
  public $vFile;
  //视图层需要渲染的数据
  public $vData;
  //单例模式私有构造方法
  private function __construct($vFile)
  {
    $this->vFile = $vFile;
  }
  /**
   * 视图加载-make方法
   * 示例:View::make('视图名称')
   * @data   2018-08-23
   * @param  [string]   $viewName [视图名称]
   * @return [obj]                [视图对象]
   */
  public static function make($viewName = NULL)
  {
    if(!$viewName){
      throw new InvalidArgumentException('视图名称不能为空！');
    }
    $vFile = self::getFilePath($viewName);
    if(is_file($vFile)){
      return new View($vFile);
    }else{
      throw new UnexpectedValueException('视图文件不存在！');
    }
  }
  /**
   * 数据渲染的链式操作-with方法
   * 示例:View::make('视图名称')->with('赋值的变量名',原始数据项)
   * @data   2018-08-23
   * @param  [string]   $name   [赋值的变量名]
   * @param  [string]   $data   [原始数据项]
   * @return [obj]              [视图对象]
   */
  public function with($name, $data = NULL)
  {
    $this->vData[$name] = $data;
    return $this;
  }
  /**
   * 加载视图文件
   * @data   2018-08-23
   * @param  [string]   $viewName [视图文件]
   * @return [string]             [文件路径]
   */
  private static function getFilePath($viewName)
  {
    $filePath = str_replace('.', '/', $viewName);
    return VIEW_PATH . $filePath . '.php';
  }
  /**
   * 视图渲染方法
   * 在with方法之后调用
   * @data   2018-08-23
   */
  public function display()
  {
    empty($this->vData)?: extract($this->vData);
    require $this->vFile;
  }
  /**
   * 未定义操作托管方法
   * @data   2018-08-23
   * @param  [string]   $method [操作名称]
   * @param  [type]     $params [参数]
   * @return [obj]              [视图对象]
   */
  public function __call($method, $params)
  {
    //starts_with 函数判断字符串开头是否为指定内容
    if(starts_with($method, 'with')){
      //snake_case 函数会将指定的字符串转换成 蛇形命名
      return $this->with(snake_case(substr($method, 4)), $params[0]);
    }
    throw new BadMethodCallException('方法 [$method] 不存在！');
  }
}