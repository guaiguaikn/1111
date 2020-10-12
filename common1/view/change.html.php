<style type="text/css">
#changeNav{
    float: left;
    height: 34px;
    margin-right: 20px;
    background: #fff;
    border: 1px solid #0c64eb;
    border-radius: 4px 2px 2px 4px;
    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05), 0 2px 6px 0 rgba(0,0,0,.045);
    box-shadow: 0 1px 1px rgba(0,0,0,.05), 0 2px 6px 0 rgba(0,0,0,.045);
    width: 185px;
    /*border-right: none;*/
}
#changeNav .title{
    padding: 0 5px;
    /*overflow: hidden;*/
    font-size: 14px;
    font-weight: 700;
    line-height: 32px;
    color: #0c64eb;
    text-align: center;
    text-overflow: ellipsis;
    white-space: nowrap;
}
#changeNav{
    color: #0c64eb;
}
#changeNav a{
    border: none;
    font-size: 14px;
    font-weight: 700;
    line-height: 32px;
    color: #0c64eb;
    text-align: left;
    text-overflow: ellipsis;
    white-space: nowrap;
    padding: 7px 8px;
}
#changeNav a div b{
    color: #0c64eb;
}
#changeNav a div{
    padding: 1px 8px;
}
#changeNav span{
    display: block;
    margin: 0;
    margin-left: 32px;
}
#changeNav .chosen-container-single .chosen-search input[type=text]{
	border: 0px solid #fff;
}
#changeNav .chosen-container .chosen-drop{position:relative;}

</style>
<div id="changeNav" class="cell" style="position: absolute;top: 1px;margin-top: 0;padding: 0;">
  <div class="title">
    <?php
    	// if(!$jurisdiction){
    	// 	if(reset($_SESSION['user']->groups)){
    	// 		$jurisdiction  = array();
    	// 	}else{
    	// 		$jurisdiction = array($this->createLink('project', 'task')=>'进度管理',$this->createLink('operating', 'questions')=>'问题管理',$this->createLink('daily', 'daily')=>'日报管理',$this->createLink('standard', 'standard')=> '工程标准规范',$this->createLink('operating', 'operation')=> '系统运行情况',$this->createLink('elestandard', 'elestandard')=> '电子政务国家标准',$this->createLink('pkstandard', 'pkstandard')=> 'PK体系标准',$this->createLink('risk', 'risk')=> '风险管控');
    	// 		$jurisdiction1 = 'project-task';
    	// 	}
    	// }
        if($jurisdiction1){
            $jurisdiction = array();
            if(common::hasPriv('project', 'task')){$jurisdiction['project-task'] = '进度管理';}
            if(common::hasPriv('operating', 'questions')){$jurisdiction['operating-questions'] = 'BUG管理';}
            if(common::hasPriv('question', 'questions')){$jurisdiction['question-questions'] = '问题管理';}
            if(common::hasPriv('daily', 'daily')){$jurisdiction['daily-daily'] = '周报管理';}
            if(common::hasPriv('standard', 'standard')){$jurisdiction['standard-standard'] = '工程标准规范';}
            if(common::hasPriv('operating', 'operation')){$jurisdiction['operating-operation'] = '系统运行情况';}
            if(common::hasPriv('elestandard', 'elestandard')){$jurisdiction['elestandard-elestandard'] = '电子政务国家标准';}
            if(common::hasPriv('pkstandard', 'pkstandard')){$jurisdiction['pkstandard-pkstandard'] = 'PK体系标准';}
            if(common::hasPriv('risk', 'risk')){$jurisdiction['risk-risk'] = '风险管控';}
            if(common::hasPriv('risk', 'listtype')){$jurisdiction['risk-listtype'] = '风险管控类别';}
            if(common::hasPriv('quality', 'quality')){$jurisdiction['quality-quality'] = '质量管控';}
            if(common::hasPriv('quality', 'listtype')){$jurisdiction['quality-listtype'] = '质量管控类别';}
            if(common::hasPriv('gantt', 'gantt')){$jurisdiction['gantt-gantt'] = '规划管理';}
            if(common::hasPriv('gantt', 'listtype')){$jurisdiction['gantt-listtype'] = '规划管理类别';}
            if(common::hasPriv('information', 'information')){$jurisdiction['information-information'] = '制度管理';}
            if(common::hasPriv('information', 'listtype')){$jurisdiction['information-listtype'] = '制度管理类别';}
            if(common::hasPriv('summary', 'summary')){$jurisdiction['summary-summary'] = '纪要管理';}
            if(common::hasPriv('summary', 'listtype')){$jurisdiction['summary-listtype'] = '纪要管理类别';}
            if(common::hasPriv('grade', 'grade')){$jurisdiction['grade-grade'] = '周打分';}
            if(common::hasPriv('grade', 'orglist')){$jurisdiction['grade-orglist'] = '单位管理';}


            if(common::hasPriv('situation', 'situation')){$jurisdiction['situation-situation'] = '终端统计';}
            if(common::hasPriv('situation', 'terminal')){$jurisdiction['situation-terminal'] = '终端管理';}
            if(common::hasPriv('situation', 'application')){$jurisdiction['situation-application'] = '应用统计';}


        }else{
            $jurisdiction = array($this->createLink('project', 'task')=>'进度管理',$this->createLink('operating', 'questions')=>'BUG管理',$this->createLink('question', 'questions')=>'问题管理',$this->createLink('daily', 'daily')=>'周报管理',$this->createLink('standard', 'standard')=> '工程标准规范',$this->createLink('operating', 'operation')=> '系统运行情况',$this->createLink('elestandard', 'elestandard')=> '电子政务国家标准',$this->createLink('pkstandard', 'pkstandard')=> 'PK体系标准',$this->createLink('risk', 'risk')=> '风险管控',$this->createLink('quality', 'quality')=> '质量管控',$this->createLink('gantt', 'gantt')=> '规划管理',$this->createLink('information', 'information')=> '制度管理',$this->createLink('summary', 'summary')=> '纪要管理',$this->createLink('grade', 'grade')=> '周打分',$this->createLink('situation', 'situation')=> '终端统计',$this->createLink('situation', 'application')=> '应用统计');
            $jurisdiction1 = 'project-task';
        }
    	echo html::select('nav', $jurisdiction, $jurisdiction1, "class='form-control chosen' style='z-index:1000' onchange='window.location.href=this.value'");
	?> 
  </div>
</div>




