<?php 

Class project Extends db{

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



	function __construct($id = null) {

		if($id != null){
			$this->id = $id;

			$Sql = "SELECT * FROM projects WHERE id = '$id';"; 

			$arrProjects = $this->GetRows($Sql);

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

		}

	}

	function form(){

		?>

		<form id="project-form" action="/ajax/setTable.php" method="POST">


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

			<button type="submit">Submit</button>

		</form>


		<?php

	}

}
