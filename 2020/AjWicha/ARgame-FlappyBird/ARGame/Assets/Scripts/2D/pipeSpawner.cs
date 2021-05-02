using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class pipeSpawner : MonoBehaviour
{
    [SerializeField] GameObject pipePrefab;
    [SerializeField] float maxTime = 1;
    [SerializeField] float height;
    [SerializeField] float pipeDestroyTImer = 15;
    [SerializeField] float pipeSpeedNow = 4;
    private float timer = 0;
    
    void Start()
    {
       spawnPipe();
    }

    void Update()
    {
        if (timer > maxTime)
        {
            spawnPipe();
        }
        timer += Time.deltaTime;
    }

    void spawnPipe()
    {
        GameObject newPipe = Instantiate(pipePrefab);
        newPipe.transform.position = transform.position + new Vector3(0, Random.Range(-height, height), 0);
        // set pipe speed 
        newPipe.GetComponent<moveToPlayer>().speed = pipeSpeedNow;
        Destroy(newPipe, pipeDestroyTImer);
        timer = 0;
    }
}
