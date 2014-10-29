<div class="container">
		<div class="row mgtop">

			<div class="col-sm-9"> <!-- article -->
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="page-header">
							<h3>Rio 2</h3><small>Posted on July 2014</small>
						</div>
						<img src="http://lorempicsum.com/rio/800/200/1" alt="img" class="featureImg">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae, numquam, aut. Eligendi tempora, modi ad adipisci a soluta placeat dignissimos, tenetur molestias nulla optio, ipsam architecto blanditiis cum animi eum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam alias suscipit necessitatibus incidunt sequi doloremque odit tenetur quisquam earum voluptate voluptatem fugit, non nobis rerum sint mollitia nostrum vel esse. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus consequuntur, sint ea non, sunt aliquam quidem nostrum, perferendis, est mollitia id nisi quia dicta quaerat! Quibusdam debitis voluptates, nostrum sed. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad tempora porro nisi mollitia praesentium, ut nulla voluptatibus. Dicta quidem animi aliquid explicabo qui sapiente rerum, eaque maiores deleniti deserunt voluptas!</p>
						<h4>Much more fun !</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero vel ea, voluptatibus, laborum ipsa ipsam sit repellendus fuga tempora et numquam ratione eum, neque. Natus repellat delectus animi sunt impedit! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore molestiae numquam ducimus dolores reprehenderit cum quos, quae itaque. Temporibus illo ullam expedita tenetur facere obcaecati pariatur rem unde neque maxime. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio fuga ducimus impedit iusto nisi et praesentium, totam illum accusamus adipisci. Voluptates, odio consectetur est hic! Quo suscipit deserunt assumenda quas. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto porro similique omnis, quasi harum ipsam, ducimus distinctio dolor dolores sed cum cumque facilis, sequi, impedit totam amet assumenda. Earum, repellat!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora facilis optio recusandae, eos iure, vero libero possimus non itaque veniam quo inventore aspernatur cum ut nostrum sapiente provident assumenda. Omnis.</p>
						<h4>New aventures</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti eos nostrum numquam deserunt nesciunt, optio ad modi veniam tempore culpa consequuntur distinctio deleniti vel quam nulla ea neque dignissimos autem? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum, dolor similique quo sit perspiciatis aspernatur quisquam esse, ipsa cum dolorum, veritatis rerum est molestias repudiandae minus neque quas a. Laudantium! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt minima doloribus ad. Officia maxime, aspernatur beatae blanditiis molestiae voluptate accusantium earum nihil tempore itaque doloribus, voluptas. Veritatis rerum iste, possimus.</p>
					</div>
				</div>
				<div class="row">
				<div class="col-sm-12">
					<div class="tabbable">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#tab1" data-toggle="tab">Poster un commentaire</a></li>
							<li><a href="#tab2" data-toggle="tab">Poster un article</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab1">
								<h3><strong>Poster un commentaire</strong></h3>
								<form class="form-horizontal" action="?p=blog" method="POST">
									<div class="form-group">
				    					<label for="pseudo" class="col-sm-2 control-label">Pseudo </label>
				    					<div class="col-sm-10">
				      						<input type="text" class="form-control" id="pseudo" name="pseudo">
				    					</div>
				  					</div>

									<div class="form-group">
				    					<label for="commentaire" class="col-sm-2 control-label">Commentaire </label>
				    					<div class="col-sm-10">
				      						<textarea class="form-control" name="commentaire" id="commentaire" cols="30" rows="10" placeholder="...en disant n'import quoi on devient n'import qui..."></textarea>
				    					</div>
				  					</div>

				  					<div class="form-group">
								    	<div class="col-sm-offset-2 col-sm-10">
								      		<button type="submit" name="submit" class="btn btn-success">Poster un commentaire</button>
								      	</div>
								    </div>
				  				</form>
							</div><!-- end tab-pane -->
							
							<div class="tab-pane" id="tab2">
								<h3><strong>Poster un article</strong></h3>
								<?php 
								if($security->logged()){ // si user est connecté on affiche
								?>
									<h4>(recupere le nom du user connecte) <small>want to publish sth...</small> </h4>
									<form class="form-horizontal" action="?p=blog" method="POST">
										<div class="form-group">
					    					<label for="article" class="col-sm-2 control-label">Article </label>
					    					<div class="col-sm-10">
					      						<textarea class="form-control" name="article" id="article" cols="30" rows="10" placeholder="...en disant n'import quoi on devient n'import qui..."></textarea>
					    					</div>
					  					</div>

					  					<div class="form-group">
									    	<div class="col-sm-offset-2 col-sm-10">
									      		<button type="submit" name="submit" class="btn btn-success">Publier un article</button>
									      	</div>
									    </div>
					  				</form>
								<?php
								}
								else{
								?>
								<h4>Vous devriez vous identifier pour pouvoir publier un article</h4>

								<?php
								}
								?>   
							</div><!-- end tab-pane -->
						</div><!-- end tab-content -->
					</div><!-- end tabbable -->
				</div><!-- end col-sm-6 -->
				</div>
			</div> <!-- end article --> 

			<div class="col-sm-3">
				<div class="list-group">
					<a href="#" class="list-group-item active">
						<h4 class="list-group-item-heading">Lorem ipsum dolor sit amet</h4>
						<p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
					</a>

					<a href="#" class="list-group-item">
						<h4 class="list-group-item-heading">Lorem ipsum dolor sit amet</h4>
						<p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
					</a>

					<a href="#" class="list-group-item">
						<h4 class="list-group-item-heading">Lorem ipsum dolor sit amet</h4>
						<p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
					</a>

					<a href="#" class="list-group-item">
						<h4 class="list-group-item-heading">Lorem ipsum dolor sit amet</h4>
						<p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
					</a>

					<a href="#" class="list-group-item">
						<h4 class="list-group-item-heading">Lorem ipsum dolor sit amet</h4>
						<p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
					</a>

					<a href="#" class="list-group-item">
						<h4 class="list-group-item-heading">Lorem ipsum dolor sit amet</h4>
						<p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
					</a>
				</div> <!-- end list-group -->
			</div> <!-- end col-sm-3 -->

		</div> <!-- end row mgtop -->
</div>