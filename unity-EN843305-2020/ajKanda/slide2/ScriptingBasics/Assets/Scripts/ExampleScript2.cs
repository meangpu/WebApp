using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class ExampleScript2 : MonoBehaviour
{
    private int enemyDistance = 0;
    private int enemyCount = 3;

    void Update()
    {
        if (Input.GetKeyDown(KeyCode.Space)){
            // EnemySearch();
            // EnemyDestruction();
            EnemyScan();
        }
    }

     void EnemyDestruction()
     {
        while (enemyCount > 0)
        {
            print("There is an enemy! Let's destroy it!");
            enemyCount--;
        } 
     }


    void EnemySearch(){
        for (int i=0; i<5; i++){
            enemyDistance = Random.Range(1, 10);
            if (enemyDistance >= 8){
                print("An enemy is far away!");
            }
            else if (enemyDistance >= 4 && enemyDistance <= 7){
                print("An enemy is at medium range!");
            }
            else if (enemyDistance < 4){
                print("An enemy is very close by!");
            }

        }
    }
    void EnemyScan()
    {
        bool isAlive = false;
        do{
            print("Scaning for enemies!");
        }
        while (isAlive == true);
    }
}
