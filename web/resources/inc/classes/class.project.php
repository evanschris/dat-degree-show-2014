<?php 

Class project Extends db{

	var $arrProjects = array();

	var $id;
   	var $title;
  	var $author;
   	var $twitter;
   	var $linkedin;
   	var $website;

   	var $short_description;
	var $description;
	var $video;

	var $author_image;
	var $project_image;
	var $sequence_image;
	var $cover_image;

	var $activeProject;


	function __construct($id = null, $title = null) {

		if($id != null || $title != null){

			if($id != null){
				$this->id = $id;
				$Sql = "SELECT * FROM projects WHERE id = '$id';"; 

				$arrProjects = $this->GetRows($Sql);


			}else if($title != null){
				$this->id = $id;
				$title = str_replace('-',' ',$title);
				$Sql = "SELECT * FROM projects WHERE title = '$title';"; 
			}
			
			$arrProjects = $this->GetRows($Sql);

			if(!empty($arrProjects)){

				$this->id = $arrProjects[0]['id'];
				$this->title = $arrProjects[0]['title'];
				$this->author = $arrProjects[0]['author'];
				$this->twitter = $arrProjects[0]['twitter'];
				$this->linkedin = $arrProjects[0]['linkedin'];
				$this->website = $arrProjects[0]['website'];

				$this->short_description = $arrProjects[0]['short_description'];
				$this->description = $arrProjects[0]['description'];
				$this->video = $arrProjects[0]['video'];

				$this->author_image = $arrProjects[0]['author_image'];
				$this->project_image = $arrProjects[0]['project_image'];
			
				$this->sequence_image = $arrProjects[0]['sequence_image'];
				$this->cover_image = $arrProjects[0]['cover_image'];

				$this->activeProject = true;


			}else{
				$this->activeProject = false;
			}
		}




		$Sql = "SELECT * FROM projects;";
		$arrProjects = $this->GetRows($Sql);
		$this->arrProjects = $arrProjects;



	}

	function form(){

		?>

		<form id="project-form" action="/resources/ajax/set.php" method="POST" enctype="multipart/form-data">


			<input type="hidden" name="table" value="projects" />

			<?php if($this->id != null){ ?>
			
				<input type="hidden" name="id" value="<?php echo $this->id; ?>" />

			<?php }	?>

			<label for="title">title</label>
			<input type="text" name="title" value="<?php echo $this->title; ?>" />

			<label for="author">author</label>
			<input type="text" name="author" value="<?php echo $this->author; ?>" />

			<label for="twitter">twitter</label>
			<input type="text" name="twitter" value="<?php echo $this->twitter; ?>" />

			<label for="linkedin">linkedin</label>
			<input type="text" name="linkedin" value="<?php echo $this->linkedin; ?>" />

			<label for="website">website</label>
			<input type="text" name="website" value="<?php echo $this->website; ?>" />

			<label for="short_description">short_description</label>
			<textarea name="short_description"><?php echo $this->short_description; ?></textarea>

			<label for="description">description</label>
			<textarea name="description"><?php echo $this->description; ?></textarea>

			<label for="video">video</label>
			<input type="text" name="video" value="<?php echo $this->video; ?>" />

			<label for="author_image">author_image</label>
			<input type="file" name="author_image" value="<?php echo $this->author_image; ?>" />

			<label for="project_image">project_image</label>
			<input type="file" name="project_image" value="<?php echo $this->project_image; ?>" />

			<label for="sequence_image">sequence_image</label>
			<input type="file" name="sequence_image" value="<?php echo $this->sequence_image; ?>" />		

			<label for="cover_image">cover_image</label>
			<input type="file" name="cover_image" value="<?php echo $this->cover_image; ?>" />		

			<button type="submit">Submit</button>

		</form>


		<?php

	}


	function adminList(){

		//echo '<pre>'. print_r($this->arrProjects) . '</pre>';

		?>

		<table class="admin_table" id="project_list">
			<tr>
				<th>Project</th>
				<th>Author</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
			</tr>


	
		<?php



			foreach($this->arrProjects as $k => $v){

				?>

					<tr>
						<td>
							<?php 
								echo $v['title'];
							?>
						</td>

						<td>
							<?php 
								echo $v['author'];
							?>
						</td>

						<td>
							<a class="element_mod_link" href="/admin?id=<?php echo $v['id']; ?>"><img class="mod_img" src="/resources/img/edit.png"/></a>
						</td>


						<td>
							<a class="element_mod_link" href="/resources/ajax/delete.php?id=<?php echo $v['id']; ?>"><img class="mod_img" src="/resources/img/delete.png"/></a>
						</td>

						
					</tr>

				<?php
			}
		?>
		</table>

		<?php
	}

	function display(){

		foreach($this->arrProjects as $k => $v){
		?>

			<article class="project-item">

	        	<div class="project-image">
	        		<a href="/project/<?php echo strtolower(str_replace(' ','-',$v['title'])); ?>">
	        			<img src="img/<?php echo str_replace(' ','-',$v['title']); ?>.jpg" width="200" height="200">
	        			<img src="img/<?php echo str_replace(' ','-',$v['author']); ?>-sequence.jpg" data-frames="15" height="200" class="sequence" id="gif" style="left: 249px;">
	        		</a>
	        	</div>
				<h1><a href="/project/<?php echo strtolower(str_replace(' ','-',$v['title'])); ?>"><?php echo $v['title'] ?></a></h1>
				<h2><?php echo $v['author'] ?></h2>
			</article>

		<?php
		}
	}


	function delete(){

		if(isset($this->id)){

			$Sql = "DELETE FROM projects WHERE id = '$this->id';";
			if(mysql_query($Sql)){
				return "Deleted successfully.";
			}else{
				return "Something went wrong.";
			}

		}

	}


}
