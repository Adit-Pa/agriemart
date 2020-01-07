async function loadData()
{
	

}
async function createModel()
{
	const model = tf.sequential()
	model.add(tf.layers.dense({inputShape : [2], units : 32, activation : 'relu'}))
	model.add(tf.layers.dense({ units : 2,activation: 'softmax'}))
	model.add(tf.layers.dense({ units : 1, useBias: true}))  
	return model;
}
async function convertData()
{
	
}
async function traninModel()
{

		const data = tf.tensor([[1,2],[3,4],[5,6],[7,8],[9,10],[11,12],[13,14]])

	const label = tf.tensor([[3],[7],[11],[15],[19],[23],[27]])
		model.compile({
	    optimizer: tf.train.sgd(0.001),
	    loss:'meanSquaredError',
	    metrics:['accuracy']
	})
	function onBatchEnd (batch,logs){
	   // console.log(logs.acc)
	}
	model.fit(data, label, {
	epochs: 50,
	callbacks: tfvis.show.fitCallbacks(
	      { name: 'Training Performance' },
	      ['loss', 'mse'], 
	      { height: 200, callbacks: ['onEpochEnd'] }
	    )
	}).then(info =>{
	    console.log(info.history.acc);
	    
	})
}
async function predictData()
{
	const prediction = model.predict(tf.tensor([[12, 28]]))
    prediction.print() 
}